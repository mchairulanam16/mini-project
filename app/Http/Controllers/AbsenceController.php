<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Code;
use App\Models\Kelas;
use App\Models\Absence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $user = Auth::user();
        $date = Carbon::now()->timezone('Asia/Bangkok');
        $today = $date->toDateString();
        $time = $date->toTimeString();
        $findcode = Code::where('name', $request->code)->first();
        $idcode = $findcode->id;
        $cekcode = $findcode->id_used_by;
        if($cekcode == $user->id || $cekcode = null) {
            Session::flash('error', 'Tidak bisa gunakan kode sendiri.');
            return redirect()->route('home')->with('eror', 'Tidak bisa gunakan kode sendiri.');
        }

        $findcode->update([
            'id_used_by' => $user->id
        ]);

        $data = Absence::create([
            'kelas_id' => $request->kelas,
            'subject_id' =>$request->subject,
            'user_id' => $user->id,
            'code_id' => $idcode,
            'teaching_role' => $request->role,
            'date' => $today,
            'start' => $time
        ]);

        // return view('out', [
        //     'data' => $data,
        //     'user' => $user,
        //     'code' => $request->code
        // ]);
        return redirect()->route('home');
            // ->with([
            //     'data' => $data,
            //     'user' => $user,
            //     'code' => $request->code
            // ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
