<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = 'requests';

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function requestsType()
    {
        return $this->belongsTo('App\RequestsType');
    }
}
