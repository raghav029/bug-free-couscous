<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantBill extends Model
{
    protected $table = "tenant_bills";
    protected $fillable = ['tenant_id', 'room_id', 'amount', 'is_paid'];

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function tenant()
    {
        return $this->belongsTo('App\Tenant');
    }
}
