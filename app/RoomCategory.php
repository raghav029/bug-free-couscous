<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{

    protected $fillable = ['name', 'description','is_active'];
    
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }

    protected $table = "room_category";

    protected $guarded = ['_token'];

}
