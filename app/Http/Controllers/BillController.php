<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\User;
use App\Room;
use App\RoomBill;
use App\RoomAllocation;
use App\TenantBill;
use Auth;
use DB;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['tenantBills', 'tenantBillsPending', 'tenantBillsHistory']);
    }
    public function index()
    {
        $expenses = Bill::get();
        return view('admin.bills.index', compact('expenses'));
    }

    public function create()
    {
        return view('admin.bills.create');
    }

    public function store(Request $request)
    {
        $bill = new Bill;
        $bill->bill_type = $request->bill_type;
        $bill->description = $request->description;
        $bill->amount = $request->amount;
        $bill->user_id = $request->user()->id;
        $bill->save();
        \Session::flash("success", "Bills have been created");
        return redirect()->route('billIndex');
    }

    public function view($id)
    {
        $bill = Bill::find($id);
        return view('admin.bills.view', compact('bill'));
    }

    public function disperse($id)
    {
        $total_rooms = Room::count();
        $rooms = Room::get();
        $bill = Bill::find($id);
        $amount = $bill->amount / $total_rooms;
        foreach($rooms as $room)
        {
            $room_bills = RoomBill::create([
                'bill_id' => $bill->id,
                'room_id' => $room->id,
                'amount' => $amount,
                'user_id' => Auth::user()->id
            ]);
        }
        \Session::flash("success", "Bill have been distrubuted to rooms");
        return redirect()->back();
    }
    

    public function roomBills()
    {
        $roomBills = DB::table('room_bills as rb')
        ->leftjoin('rooms as r', 'rb.room_id', 'r.id')
        ->select('r.name', 'rb.*')
        ->where('rb.is_divide', 0)
        ->get();
        return view('admin.bills.room-bills', compact('roomBills'));
    }

    public function rents()
    {
        $rooms = DB::table('room_allocation as ra')
        ->leftjoin('rooms as r', 'ra.room_id', 'r.id')
        ->get();
        return view('admin.bills.rent.index', compact('rooms'));
    }


    public function roomRentCreate()
    {
        $room = Room::pluck('name', 'id');
        $rooms = Room::get();
        return view('admin.bills.rent.create', compact('room', 'rooms'));
    }

    public function roomRentStore(Request $request)
    {
        $roomBills = new RoomBill;
        $roomBills->user_id = $request->user()->id;
        $roomBills->description = $request->description;
        $roomBills->room_id = $request->room_id;
        $roomBills->rent = $request->rent;
        $roomBills->discount = $request->discount;
        $roomBills->utilities = $request->utilities;
        $roomBills->total = $request->utilities + $request->rent - $request->discount;
        $roomBills->is_divide = 0;
        $roomBills->save();

        \Session::flash("success", "Bill have been created successfully.");
        return redirect()->route('roomBills');
    }

    public function disperseTenat($id)
    {
        $roomBill = RoomBill::find($id);
        $room_allocation = RoomAllocation::where('room_id', $roomBill->room_id)->get();
        $total_tenants = count($room_allocation);
        // dd($roomBill);
        if($total_tenants > 0){

            $amount = $roomBill->total/$total_tenants;
            foreach($room_allocation as $key=>$tenant){
                TenantBill::create([
                    'tenant_id' => $tenant->tenant_id,
                    'room_id' => $roomBill->room_id,
                    'amount' => $amount,
                    'is_paid' => 0,
                ]);
        }
        $roomBill->is_divide = 1;
        $roomBill->save();
        \Session::flash("success", "Bill have been distrubuted to rooms");
    }else{
        \Session::flash("error", "This room is not allocated to anyone.");

        }

        
        return redirect()->back();
    }

    public function tenantBills()
    {
        if(session('tenant_id')){
            $tenant_bills = TenantBill::with('room')->where('tenant_id', session('tenant_id'))->get();
            return view('tenant.frontend.payment.index', compact('tenant_bills'));
        }else{
            return redirect()->route('tenatLogin');
        }
    }

    public function tenantBillsPending()
    {
        if(session('tenant_id')){
            $tenant_bills = TenantBill::with('room')
            ->where('tenant_id', session('tenant_id'))
            ->where('is_paid', 0)
            ->get();
            return view('tenant.frontend.payment.pending', compact('tenant_bills'));
        }else{
            return redirect()->route('tenatLogin');
        }
    }

    public function tenantBillsHistory()
    {
        if(session('tenant_id')){
            $tenant_bills = TenantBill::with('room')
            ->where('tenant_id', session('tenant_id'))
            ->where('is_paid', 1)
            ->get();
            return view('tenant.frontend.payment.pending', compact('tenant_bills'));
        }else{
            return redirect()->route('tenatLogin');
        }
    }


    //Get all tenants with bills

    public function allTenantBills()
    {
        $tenants = TenantBill::with('tenant','room')->where('is_paid', 0)->get();
        return view('admin.bills.tenant-bills', compact('tenants'));
    }

    public function tenantsPaymentHistory()
    {
        $tenants = TenantBill::with('tenant', 'room')->where('is_paid', 1)->get();
        return view('admin.bills.tenant-bills-history', compact('tenants'));
    }
}
