<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::all();

        return view('user', ['data' => $data]);
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
        $idAsisten = $request->input('id_asisten');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $role = $request->input('role');

        // Create a new user using the retrieved data
        User::create([
            'id_asisten' => $idAsisten,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Asisten Berhasil Ditambahkan'
        ]);
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
        $user = User::findOrFail($id);

        return response()->json($user);
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
        // $validator = $request->validate([
        //     'id_asisten' => 'required',
        //     'name' => 'required',
        //     'email' => 'required',
        //     'role' => 'required'
        // ]);
        $user = User::findOrFail($id);
        $user->update([
            'id_asisten' => $request->id_asisten_edit,
            'name' => $request->name_edit,
            'email' => $request->email_edit,
            'role' => $request->role_edit
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Asisten Berhasil Diedit'
        ]);

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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user');
    }
}
