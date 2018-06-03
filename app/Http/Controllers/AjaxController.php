<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomCategory;
use App\Room;
use App\TenantBill;
use App\Payment;

class AjaxController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['postMakepayment']]);
    }
    public function getRoomsByCategory(Request $request)
    {
        $rooms = Room::where('room_category_id', $request->get('room_category_id'))
        ->select('name', 'id')
        ->get();
        return $rooms;
    }

    public function getRoomsRent($room_id)
    {
        $rent = Room::where('id',$room_id)->pluck('rent')->first();
        return $rent;
    }

    public function getTenantBill(Request $request)
    {
        $tenant_bill = TenantBill::find($request->tenant_bill_id);
        return response()->json($tenant_bill);
    }

    public function postMakepayment(Request $request)
    {
        $amount = $request->amount;
        $discount = $request->discount;
        $tenant_id = $request->tenant_id;
        $payment = new Payment;
        $payment->type="cash";
        $payment->amount=$amount;
        $payment->discount=$discount;
        $payment->tenant_id=$tenant_id;
        $payment->user_id=$request->user()->id;
        $data = $payment->save();
        if($data){
            $tenant_bill = TenantBill::where('tenant_id', $tenant_id)->where('is_paid', 0)->first();
            $tenant_bill->is_paid = 1;
            $tenant_bill->save();
            return response()->json([
                'message' => 'Payment have been made successfully',
                'status' => '1'
            ]);
        }else{
                return response()->json([
                    'message' => 'Unable to make payment',
                    'status' => '0'
                ]);
        }
        // dd($request->al());
    }
}
