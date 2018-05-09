<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use DB;
use App\InOut;

class InOutController extends Controller
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
        // $tenants = Tenant::with('timeInOut', 'rooms')
       $tenants = DB::table('inout as i')
       ->leftjoin('tenants as t', 't.id', 'i.tenant_id')
       ->leftjoin('room_allocation as ra', 'ra.tenant_id', 't.id')
       ->leftjoin('rooms as r', 'r.id', 'ra.room_id')
       ->select('i.*','t.name as tenant_name','t.email','r.name as room_name', 'i.created_at as time_in', 'i.updated_at as time_out')
       ->where('i.is_active', 1)
       ->get();
    //    ->groupBy(function($e){
    //        return $e->tenant_name;
    //    }); 
        // ->toArray();
        // dd($tenants);
        // ->toArray();
        return view('timing.index', compact('tenants'));
    }

    public function addTimeInOut($tenant_id)
    {
        $tenant = DB::table('inout as i')
       ->leftjoin('tenants as t', 't.id', 'i.tenant_id')
       ->leftjoin('room_allocation as ra', 'ra.tenant_id', 't.id')
       ->leftjoin('rooms as r', 'r.id', 'ra.room_id')
       ->select('i.*','t.name as tenant_name','t.email','r.name as room_name', 'i.created_at as time_in', 
       'i.updated_at as time_out', 'i.is_active')
       ->where('t.id', $tenant_id)
       ->where('i.is_active', 1)
       ->first();
    //    dd($tenant);
       return view('timing.create', compact('tenant'));
    }

    public function store(Request $request)
    {
        $in_out = InOut::find($request->input('id'));
        if($request->input('status') == 'in'){
            $in_out->updated_at = NOW();
            $time_update = $in_out->save();
            if($time_update){
                \Session::flash("success", "Student status have been updated.");
                return redirect()->route('timeIndex'); 
            }
        }
        else if($request->input('status') == 'out'){
            $in_out->is_active = '0';
            $time_update = $in_out->save();
            if($time_update){
                $time_in_out = New InOut;
                $time_in_out->tenant_id = $request->input('tenant_id');
                $time_in_out->is_active = '1';
                $time_in_out->user_id = $request->user()->id;
                $time_in_out->save();
                \Session::flash("success", "Student status have been updated.");
                return redirect()->route('timeIndex'); 
            }
        }
    }
}
