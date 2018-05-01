<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomCategory;

class RoomCategoryController extends Controller
{
    //
    public function index()
    {
        $roomCategories = RoomCategory::paginate(10);
        return view("rooms.category.index", compact('roomCategories'));
    }

    public function create()
    {
        return view("rooms.category.create");
    }

    public function store(Request $request)
    {
        $roomsCategory = new RoomCategory($request->all());
        $roomsCategory->save();
        \Session::flash('success','New Room Category have been added.');
        // dd($request->all());
        return redirect()->route('roomCatIndex');
    }

}
