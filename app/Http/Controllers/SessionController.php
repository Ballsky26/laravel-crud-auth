<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index()
    {
        return view('sesi.index');
    }
    public function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email Wajib diisi',
                'password.required' => 'Password Wajib diisi',
            ]
        );
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            // Kalau otentikasi sukes
            return redirect('produk')->with('success', 'Berhasil Login');
        } else {
            // Kalau otentikasi gagal
            return redirect('sesi')->withErrors('Username dan Password yang dimaksukkan tidak Valid');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout');
    }
    public function register()
    {
        return view('sesi.register');
    }
    public function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6'
            ],
            [
                'name.required' => 'Nama Wajib diisi',
                'email.required' => 'Email Wajib diisi',
                'email.email' => 'Silahkan Masukkan Email yang Valid',
                'email.unique' => 'Email sudah terdaftar',
                'password.required' => 'Password Wajib diisi',
                'password.min' => 'Password minimal 6 Karakter'
            ]
        );

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::attempt($infologin)) {
            // Kalau otentikasi sukes
            return redirect('sesi')->with('success', Auth::user()->name . 'Berhasil Daftar Akun');
        } else {
            // Kalau otentikasi gagal
            return redirect('sesi')->withErrors('Username dan Password yang dimaksukkan tidak Valid');
        }
    }
}
