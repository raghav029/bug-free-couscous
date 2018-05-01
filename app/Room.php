<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillale = ['name', 'number', 'description','room_category_id', 'is_active'];

    protected $guarded = ['_token'];

    public function tenants()
    {
        return $this->hasMany('App\Tenant');
    }
}
