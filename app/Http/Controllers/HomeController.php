<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
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
    public function index()
    {
        $name = Auth::user()->name;
        $kelas = Kelas::all();
        $subject = Subject::all();

        return view('home', [
            'name' => $name,
            'kelas' => $kelas,
            'subject' => $subject
        ]);
    }
}
