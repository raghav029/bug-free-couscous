<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBill extends Model
{
    protected $table = "room_bills";

    protected $fillable = ['room_id', 'rent', 'utilities','total', 'discount','description','is_divide','user_id'];

    public function room()
    {
        return $this->belongsTo('App\Room');
    }
}
