<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use Illuminate\Http\RedirectResponse;
use App\RoomCategory;


class RoomController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::paginate(10);
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $roomsCategory = RoomCategory::pluck('name','id');
        return view('rooms.create', compact('roomsCategory'));
    }
    

    public function store(Request $request)
    {
        // dd($request->all());exit();
        try{
            $rooms = new Room($request->all());
            $rooms->user_id = $request->user()->id;
            $rooms->save();
            Session::flash('success','New Room have been added.');
            return redirect()->route('roomIndex');
        }catch(Exception $e){
            report($e);
            return false;
        }
    }
}
