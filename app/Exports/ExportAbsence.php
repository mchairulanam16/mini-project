<?php

namespace App\Exports;

use App\Models\Absence;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsencesExport implements FromCollection
{
    public function collection()
    {

        return Absence::all();
    }
}
