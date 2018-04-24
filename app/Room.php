<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillale = ['name', 'number'];

    protected $guarded = ['_token'];
}
