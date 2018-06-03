<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $fillable = ['requests_type_id', 'description', '	tenant_id', 'status'];

    protected $table = 'requests';

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }

    public function requestsType()
    {
        return $this->belongsTo('App\RequestsType', 'requests_type_id', 'id');
    }
}
