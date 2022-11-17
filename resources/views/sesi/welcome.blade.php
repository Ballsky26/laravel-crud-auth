@extends('layout.aplikasi')

@section('content')

<div class="w-50 text-center border rounded px-3 py-3 mx-auto">
    <h1>Selamat Datang</h1>
    <p>Silahkan Login atau Daftar Akun untuk masuk ke Aplikasi</p>
    <a href="/sesi" class="btn btn-primary btn-lg">Login</a>
    <a href="/sesi/register" class="btn btn-success btn-lg">Register</a>
</div>
    
@endsection