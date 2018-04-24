<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Room;
use Illuminate\Http\RedirectResponse;


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
        return view('rooms.create');
    }
    

    public function store(Request $request)
    {
        // print_r($request->all());
        $rooms = new Room($request->all());
        $rooms->user_id = $request->user()->id;
        $rooms->save();
        return redirect()->route('roomIndex');
    }
}
