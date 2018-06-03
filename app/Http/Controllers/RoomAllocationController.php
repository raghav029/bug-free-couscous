<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Tenant;
use Illuminate\Http\RedirectResponse;
use App\Room;
use App\RoomCategory;
use App\RoomAllocation;
use App\InOut;
use DB;

class RoomAllocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $allocatedRooms = DB::table('room_allocation as ra')
        ->leftjoin('rooms as r', 'r.id', 'ra.room_id')
        ->leftjoin('tenants as t', 't.id', 'ra.tenant_id')
        ->select('ra.id','ra.description','t.name as tenant_name', 'r.name as room_name', 'ra.updated_at as allocation_date')
        ->where('ra.is_active', 1)
        ->paginate(10);
        return view('rooms.allocation.index', compact('allocatedRooms'));
    }

    public function create()
    {
        $rooms = Room::pluck('name', 'id');
        $roomsCategory = RoomCategory::pluck('name', 'id');
        $tenants = Tenant::where('room_allocation_status', 0)->pluck('name', 'id');
        return view('rooms.allocation.create', compact('rooms', 'roomsCategory', 'tenants'));
    }

    public function store(Request $request)
    {
        $roomAllocation = new RoomAllocation($request->all());
        $roomAllocation->user_id = $request->user()->id;
        $roomAllocation->save();
        $room = Room::where('id', $request->room_id)->update([
            'is_assigned'=> 1
        ]);
        $tenant = Tenant::where('id', $request->input('tenant_id'))
        ->update([
            'room_allocation_status'=> 1
        ]);

        $inout = InOut::create([
            'tenant_id' => $request->input('tenant_id'),
            'is_active' => 1,
            'user_id' => $request->user()->id
        ]);
        return redirect()->back();
        // dd($request->all());
    }

    public function edit($id)
    {
        $roomAllocation = DB::table('room_allocation')->where('id', $id)->first();
        return view('rooms.allocation.edit', compact('roomAllocation'));
    }
}
