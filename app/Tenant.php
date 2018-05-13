<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Tenant extends Authenticatable
{
    use Notifiable;

    protected $guard = 'tenant';

    protected $fillable = ['name', 'email', 'phone', 'description', 'room_id','user_id', 'room_allocation_status', 'is_active'];

    protected $guarded = ['_token'];

    protected $hidden = [
        'password','remember_token',
    ];
    public function timeInOut()
    {
        return $this->hasMany('App\InOut');
    }

    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'room_allocation');
    }
}
