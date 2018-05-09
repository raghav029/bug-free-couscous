<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InOut extends Model
{
    protected $fillable = ['tenant_id', 'is_active', 'user_id'];

    protected $guard = ['_token'];

    protected $table = "inout";

    // public function 
}
