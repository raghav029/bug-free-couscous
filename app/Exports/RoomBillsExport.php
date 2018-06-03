<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\RoomBill;

class RoomBillsExport implements FromCollection
{
    public function collection()
    {
        return RoomBill::all();
    }
}