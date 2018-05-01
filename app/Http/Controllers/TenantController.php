<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use Illuminate\Http\RedirectResponse;
use App\Room;
use App\RoomCategory;

class TenantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
}
