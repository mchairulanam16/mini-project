<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Absence;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;

class AbsenceExport implements FromView
{
    protected $startDate;
    protected $endDate;

    public function __construct(?Carbon $startDate, ?Carbon $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {

        $query = Absence::with('user')
        ->with('code')
        ->with('subject')
        ->with('kelas');

        if ($this->startDate && $this->endDate){
            $query->whereBetween('date', [$this->startDate, $this->endDate]);
        }

        $data= $query->get();

        return view('export', ['data' =>$data]);
    }
}
