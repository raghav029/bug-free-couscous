<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'description', 'room_id','user_id', 'room_allocation_status'];

    protected $guarded = ['_token'];
}
