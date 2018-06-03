<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Tenant;

class TenantExport implements FromCollection
{
    public function collection()
    {
        return Tenant::all();
    }
}