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
        $tenants = Tenant::paginate(10);
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
