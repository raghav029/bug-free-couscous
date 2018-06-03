<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['bill_type', 'description', 'amount', 'user_id'];

    protected $guard = ['_token'];

}
