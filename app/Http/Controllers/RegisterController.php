<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register', [
            'title' => 'Register',
        ]);        
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required|email:dns|unique:users',
            'noHP' => 'required|numeric|unique:users|min_digits:10|max_digits:13',
            'kataSandi' => 'required|min:8',
            'konfirmasiKataSandi' => 'required|same:kataSandi',
        ],[
            'required' => 'Kolom tidak boleh kosong!',
            'same' => 'Kolom Kata Sandi dan Konfirmasi harus sama!',

            'nama.min' => 'Nama harus memiliki minimal 3 karakter!',

            'noHP.min_digits' => 'No HP harus memiliki minimal 10 digit!',
            'noHP.max_digits' => 'No HP harus memiliki maksimal 13 digit!',
            'kataSandi.min' => 'Kata Sandi harus memiliki minimal 8 digit!',

            'email.unique' => 'Email sudah terdaftar!',
            'noHP.unique' => 'Nomor HP sudah terdaftar!',
            
        ]);

        $data = [
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'noHP' => $validated['noHP'],
            'password' => bcrypt($validated['kataSandi']),
        ];

        User::create($data);

        return redirect('/login')->with('registrationSuccess', 'Registration success, please login!');
    }
}
