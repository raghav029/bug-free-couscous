<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['type', 'amount', 'discount', 'tenant_id', 'user_id'];

    protected $table = "payments";

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }
}
