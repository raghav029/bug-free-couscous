<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomCategory;
use App\Room;

class AjaxController extends Controller
{
    public function getRoomsByCategory(Request $request)
    {
        $rooms = Room::where('room_category_id', $request->get('room_category_id'))
        ->select('name', 'id')
        ->get();
        return $rooms;
    }
}
