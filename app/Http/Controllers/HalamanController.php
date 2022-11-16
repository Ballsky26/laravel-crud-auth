<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
        return view('halaman.index');
    }
    public function tentang()
    {
        return view('halaman.tentang');
    }
    public function kontak()
    {
        $data = [
            'judul' => 'Ini adalah Halaman Kontak',
            'kontak' => [
                'email' => 'syaiful26iqbal@gmail.com',
                'youtube' => 'Ballsky'
            ]
        ];
        return view('halaman.kontak')->with($data);
    }
}
