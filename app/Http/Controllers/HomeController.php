<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kelas;
use App\Models\Absence;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $kelas = Kelas::all();
        $subject = Subject::all();
        $user = Auth::user();
        $id_asisten = Auth::user()->id_asisten;
        $today = Carbon::now()->timezone('Asia/Bangkok');
        $data = Absence::where('user_id', $user)
            ->where('date', $today)
            ->whereNotNull('start')
            ->whereNull('end')
            ->with('user')
            ->with('code')
            ->with('kelas')
            ->with('subject')
            ->get();

        return view('home', [
            'id_asisten' => $id_asisten,
            'kelas' => $kelas,
            'subject' => $subject
        ]);
    }

    // public function index(Request $request)
    // {
    //     $kelas = Kelas::all();
    //     $subject = Subject::all();
    //     $user = Auth::user();
    //     $id_asisten = Auth::user()->id_asisten;
    //     $today = Carbon::now()->timezone('Asia/Bangkok');

    //     $data = Absence::where('user_id', $user->id)
    //         ->whereDate('date', $today->toDateString())
    //         ->whereNotNull('start')
    //         ->whereNull('end')
    //         ->with('user')
    //         ->with('code')
    //         ->with('kelas')
    //         ->with('subject')
    //         ->get();

    //     if ($data->isEmpty()) {
    //         return view('home', [
    //             'data' => null,
    //             'id_asisten' => $id_asisten,
    //             'kelas11' => $kelas,
    //             'subject' => $subject
    //         ]);
    //     } else {
    //         return view('home', ['data' => $data]);
    //     }
    // }
}
