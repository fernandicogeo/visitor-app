<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registration');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255',
            'instansi' => 'required|max:255',
            'nomor_hp' => 'required|numeric',
            'nik' => 'required|numeric',
            'foto_ktp' => 'required|image|file|max:3072',
        ]);

        $validatedData['foto_ktp'] = $request->file('foto_ktp')->store('users-images/foto-ktp');

        $validatedDataUser['nama'] = $validatedData['nama'];
        $validatedDataUser['email'] = $validatedData['email'];
        $validatedDataUser['instansi'] = $validatedData['instansi'];
        $validatedDataUser['nomor_hp'] = $validatedData['nomor_hp'];
        $validatedDataUser['nik'] = $validatedData['nik'];
        $validatedDataUser['foto_ktp'] = $validatedData['foto_ktp'];
        $validatedDataUser['password'] = bcrypt($validatedData['password']);
        $validatedDataUser['remember_token'] = $request['_token'];
        $validatedDataUser['role'] = "visitor";

        User::create($validatedDataUser);

        return redirect('/login')->with('pesan', 'Anda berhasil registrasi');
    }
}
