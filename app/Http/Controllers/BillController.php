<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use Auth;
use App\User;
use App\Room;
use App\RoomBill;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        // dd($request->user()->id);
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
        // dd(Auth::user()->id);
        $total_rooms = Room::count();
        $rooms = Room::get();
        $bill = Bill::find($id);
        $amount = $bill->amount / $total_rooms;
        foreach($rooms as $room)
        {
            $room_bills = RoomBill::create([
                'room_id' => $room->id,
                'amount' => $amount,
                'user_id' => Auth::user()->id
            ]);
        }
        \Session::flash("success", "Bill have been distrubuted to rooms");
        return redirect()->back();
    }
}
