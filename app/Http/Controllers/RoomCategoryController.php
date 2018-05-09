<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomCategory;

class RoomCategoryController extends Controller
{
    //
    public function index()
    {
        $roomCategories = RoomCategory::where('is_active',1)->paginate(10);
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

    public function edit($id)
    {
        $roomsCategory = RoomCategory::findOrFail($id);

        return view('rooms.category.edit', compact('roomsCategory'));
    }

    public function update(Request $request)
    {
        $roomsCategory = RoomCategory::findOrFail($request->id);
        $roomsCategory->name = $request->name;
        $roomsCategory->description = $request->description;
        $roomsCategory->is_active = $request->is_active;
        $update = $roomsCategory->save();
        if($update){
            \Session::flash('success','Room Category have been updated.');
        }else{
            \Session::flash('error','Unable to update room category');
        }
        // dd($request->all());
        return redirect()->back();
    }

    public function softDelete($id)
    {
        $roomsCategory = RoomCategory::findOrFail($id);
        $roomsCategory->is_active = 0;
        if($roomsCategory->save()){
            \Session::flash('success','Room Category have been deactivated.');
        }else{
            \Session::flash('error','Unable to deactivate room category');
        }
        return redirect()->back();
    }

}
