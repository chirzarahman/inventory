<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Manajemen User',
            'user' => User::all()
        ];
        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Add User',
        ];
        return view('users.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // file = $request->file('foto');
        // $path = $file->store('public/profil');
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('12345'),
            'role' => $request->role,
            // 'foto' => $path,
        ];
        User::create($data);
        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => User::where('id', $id)->get()
        ];
        return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //$user = User::where('id', $id)->first();
        // if ($request->foto == null) {
        //     $path = $user->foto;
        // } else {
        //     $file = $request->file('foto');
        //     $path = $file->store('public/profil');
        //     Storage::delete($user->foto);
        // }
        $password = $request->password;
        if ($password == null) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                //'password' => $user->password,
                'role' => $request->role,
                //'foto' => $path,
            ];
            User::where('id', $id)->update($data);
        } else {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                //'password' => Hash::make($request->password),
                'role' => $request->role,
                //'foto' => $path,
            ];
            User::where('id', $id)->update($data);
        }
        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan!');
    }
}