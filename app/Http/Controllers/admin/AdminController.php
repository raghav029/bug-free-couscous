<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tenant;
use App\Room;
use App\Requests;
use App\RoomBill;
use Auth;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_tenants = Tenant::count();
        $total_rooms = Room::count();
        $total_requests = Requests::count();
        $total_bills = RoomBill::count();
        $notifications = Requests::with('requestsType')->get();
        return view('admin.dashboard.index', compact('total_tenants', 'total_rooms', 'total_requests', 'total_bills', 'notifications'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('admin.users.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->national_number = $request->national_number;
        $user->save();
        \Session::flash('success', 'Profile have been updated.');
        return redirect()->back();
    }
}
