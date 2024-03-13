<?php

namespace App\Exports;

use App\Models\Absence;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AbsenceExport implements FromView
{
    public function view(): View
    {

        $data = Absence::with('user')
        ->with('code')
        ->with('subject')
        ->with('kelas')
        ->get();

        return view('export', ['data' =>$data]);
    }
}
