<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = ['hostel_name', 'country', 'state', 'city', 'address', 'meta_title', 'meta_description', 'owner_name'];

    protected $guard = ['_token'];
}
