<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use Illuminate\Http\RedirectResponse;
use App\Room;
use App\RoomCategory;
use App\RequestsType;
use App\Requests;
use App\InOut;
use App\TenantBill;
use App\RoomBill;

class TenantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['tenantHome', 'tenantRequests','tenantRequest','tenantProfile', 'tenantProfileUpdate','tenantRequestStore', 'tenantRequestHistory']);
    }

    public function index()
    {
        $tenants = Tenant::where('is_active',1)->paginate(10);
        return view('tenant.index', compact('tenants'));
    }

    public function tenantView($id)
    {
        $tenant = Tenant::find($id);
        $tenant_timing = InOut::where('tenant_id', $id)->get();
        $payments = TenantBill::where('tenant_id', $tenant->id)->get();
        return view('tenant.view', compact('tenant', 'tenant_timing', 'payments'));
    }

    public function create()
    {
        $rooms = Room::pluck('name', 'id');
        $roomsCategory = RoomCategory::pluck('name', 'id');
        return view('tenant.create', compact('rooms', 'roomsCategory'));
    }

    public function store(Request $request)
    {
        $tenant = new Tenant($request->all());
        $tenant->user_id = $request->user()->id;
        $tenant->room_allocation_status = 0;
        $tenant->save();
        \Session::flash('success','New tenant have been added.');
        // dd($request->all());
        return redirect()->route('tenantIndex');
    }

    public function edit($id)
    {
        $tenant = Tenant::find($id);
        return view('tenant.edit', compact('tenant'));
    }

    public function delete($id)
    {
        $tenant = Tenant::find($id);
        $tenant->is_active = 0;
        if($tenant->save()){
            \Session::flash('success', 'Tenant have been deleted.');
        }else{
            \Session::flash('error', 'Unable to delete tenant.');
        }
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $tenant = Tenant::find($request->id);
        $tenant->name = $request->name;
        $tenant->email = $request->email;
        $tenant->phone = $request->phone;
        $tenant->description = $request->description;
        if($tenant->save()){
            \Session::flash('success', 'Tenant have been updated.');
        }else{
            \Session::flash('error', 'Unable to update Tenant.');
        }
        return redirect()->back();
    }

    public function tenantHome()
    {
        if(session('tenant_id')){
            $tenant = Tenant::with('rooms')->find(session('tenant_id'));
            $notifications = Requests::where('tenant_id', session('tenant_id'))->get();
            $total_tenants = Tenant::count();
            $total_rooms = Room::count();
            $total_requests = Requests::where('tenant_id', session('tenant_id'))->count();
            $total_bills = RoomBill::count();
            return view('tenant.frontend.index', compact('tenant','notifications', 'total_tenants', 'total_rooms', 'total_requests', 'total_bills'));
        }else{
            return redirect()->route('tenatLogin');
        }
    }

    public function tenantRequests()
    {
        if(session('tenant_id')){
            $request_types = Requests::with('requestsType')->where('tenant_id', session('tenant_id'))->get();
            // dd($request_types);
            return view('tenant.frontend.requests.index', compact('request_types'));
        }else{
            return redirect()->route('tenatLogin');
        }
    }

    public function tenantRequest()
    {
        if(session('tenant_id')){
            $request_types = RequestsType::pluck('request_name', 'id');
            return view('tenant.frontend.requests.create', compact('request_types'));
        }else{
            return redirect()->route('tenatLogin');
        }
    }
    public function tenantRequestStore(Request $request)
    {
        // dd(session('tenant_id'));
        $requests = new Requests;
        $requests->requests_type_id = $request->requests_type_id;
        $requests->description = $request->description;
        $requests->tenant_id = session('tenant_id');
        $requests->status = 0;
        $requests->save();
        \Session::flash('success', 'Your request have been notified to admin.');
        return redirect()->route('tenantRequestIndex');
    }
    public function tenantRequestHistory()
    {
        if(session('tenant_id')){
            $request_types = Requests::with('requestsType')
            ->where('status', 1)
            ->where('tenant_id', session('tenant_id'))->get();
            return view('tenant.frontend.requests.history', compact('request_types'));
        }else{
            return redirect()->route('tenatLogin');
        }
    }

    public function tenantBillsPayment(Request $request)
    {
        dd($request->al());
    }

    public function tenantProfile()
    {
        if(session('tenant_id')){
            $profile = Tenant::find(session('tenant_id'));
            return view("tenant.frontend.profile", compact('profile'));
        }else{
            return redirect()->route('tenatLogin');
        }
    }

    public function tenantProfileUpdate(Request $request)
    {
        if(session('tenant_id')){
            $tenant = Tenant::find(session('tenant_id'));
            $tenant->name = $request->name;
            $tenant->email = $request->email;
            $tenant->phone = $request->phone;
            $tenant->description = $request->description;
            $tenant->save();
            \Session::flash('success', 'Profile have been updated');
            return redirect()->back();
        }else{
            return redirect()->route('tenatLogin');
        }

    }
}
