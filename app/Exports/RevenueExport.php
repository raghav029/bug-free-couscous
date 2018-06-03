<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Payment;

class RevenueExport implements FromCollection
{
    public function collection()
    {
        return Payment::all();
    }
}