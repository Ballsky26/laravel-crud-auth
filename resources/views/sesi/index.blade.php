@extends('layout.aplikasi')

@section('content')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
       <h1 class="mb-3">Halaman Login</h1>
        <form action="/sesi/login" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ Session::get('email') }}" >
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="email">
            </div>
            <div class="mb-3 d-grid">
                <button class="btn btn-primary" name="submit"
                type="submit">Login</button>
            </div>
            <p>Belum Punya Akun? <a href="/sesi/register">Daftar Sekarang</a></p>
        </form>
    </div>

@endsection