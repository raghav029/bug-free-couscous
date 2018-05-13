<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use Illuminate\Http\RedirectResponse;
use App\Room;
use App\RoomCategory;
use App\RequestType;

class TenantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['tenantHome']);
        // $this->middleware('');
        // echo "into tenant";exit();
        // $this->middleware('tenant');
    }

    public function index()
    {
        $tenants = Tenant::where('is_active',1)->paginate(10);
        return view('tenant.index', compact('tenants'));
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
        // dd(Auth::tenants()->name);
        $tenant = Tenant::with('rooms')->find(session('tenant_id'));
        return view('tenant.frontend.index', compact('tenant'));
    }

    public function tenantRequests()
    {
        $request_types = RequestType::get();
        // return view('');
    }
}
