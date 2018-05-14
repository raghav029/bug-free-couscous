<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBill extends Model
{
    protected $table = "room_bills";

    protected $fillable = ['room_id', 'amount', 'user_id'];
}
