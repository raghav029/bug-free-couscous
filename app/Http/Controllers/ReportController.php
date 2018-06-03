<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tenant;
use App\Room;
use App\Payment;
use App\RoomBill;
use App\Exports\RoomBillsExport;
use App\Exports\TenantExport;
use App\Exports\RevenueExport;
use Excel;

class ReportController extends Controller
{
    function __construct(\Maatwebsite\Excel\Excel $excel)
    {
        $this->excel = $excel;
        $this->middleware('auth');
    }

    public function tenants($filters = null)
    {
        // dd(\Request::input('query'));
        
        $rooms = Room::get();
        $tenants = Tenant::with(['rooms']);
        if(\Request::input('query') != null){
            $tenants = $tenants
            ->orWhere('name', 'LIKE', '%'. \Request::input('query') .'%')
            ->orWhere('email', 'LIKE', '%'. \Request::input('query') .'%')
            ->orWhere('description', 'LIKE', '%'. \Request::input('query') .'%');
        }

        if(\Request::input('tenant_status') != null){
         if(\Request::input('tenant_status') == 'active'){
                $tenants = $tenants->where('tenants.is_active','=','1');
            }else{
                $tenants = $tenants->where('tenants.is_active','=','0');
            }

        }

        $tenants = $tenants->get();
        return view('reports.tenants', compact('tenants', 'rooms'));
    }

    public function totalRevenue()
    {
        $revenue = Payment::with('tenant');
        if(\Request::input('start_date') != ""){
            $revenue = $revenue->whereBetween('created_at', array(\Request::input('start_date'), \Request::input('end_date')));
        }
        if(\Request::input('query') != ""){
            $revenue = $revenue->where('type', \Request::input('query'))->orWhere('amount',  \Request::input('query'))->orWhere('description', \Request::input('query'));
        }
        $revenue = $revenue->get();
        // dd($revenue);
        return view('reports.total-revenue', compact('revenue'));
    }

    public function rentReport()
    {
        $roomBills = RoomBill::with('room');
        if(\Request::input('start_date') != ""){
            $roomBills = $roomBills->whereBetween('created_at', array(\Request::input('start_date'), \Request::input('end_date')));
        }
        $roomBills = $roomBills->get();
        // dd($roomBills);
        return view('reports.rent', compact('roomBills'));
    }

    public function roomBillExport()
    {
        return Excel::download(new RoomBillsExport, 'roomBills.xlsx');
    }

    public function tenantExport()
    {
        return Excel::download(new TenantExport, 'tenants.xlsx');
    }
    
    public function revenueExport()
    {
        return Excel::download(new RevenueExport, 'revenue.xlsx');
    }
}
