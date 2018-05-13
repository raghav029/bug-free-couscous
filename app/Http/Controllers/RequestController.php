<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Requests;
use DB;

class RequestController extends Controller
{
    public function adminIndex()
    {
        // $requests = Requests::with([ 'requestsType','tenant'])->get();
        $requests = DB::table('requests as r')
        ->leftjoin('tenants as t', 't.id', 'r.tenant_id')
        ->leftjoin('requests_type as rt', 'rt.id', 'r.requests_type_id')
        ->select('r.id','rt.request_name', 't.name', 't.email', 'r.description as request_description', 'r.status', 'r.created_at')
        ->get();
        return view('admin.requests.index', compact('requests'));
    }

    public function adminRequestView($id)
    {
        $request = DB::table('requests as r')
        ->leftjoin('tenants as t', 't.id', 'r.tenant_id')
        ->leftjoin('requests_type as rt', 'rt.id', 'r.requests_type_id')
        ->leftjoin('room_allocation as ra', 'ra.tenant_id', 't.id')
        ->leftjoin('rooms as rm', 'rm.id', 'ra.room_id')
        ->select('rm.name as room_name', 't.name as tenant_name', 'r.status','rm.number as room_number',
        'rt.request_name', 'r.description', 'r.created_at', 'r.id')
        ->where('r.id', $id)
        ->first();
        // dd($request);
        return view('admin.requests.view', compact('request'));
    }
}
