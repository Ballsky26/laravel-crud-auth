@extends('layout.aplikasi')

@section('content')

<h1>{{ $judul }}</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem optio veritatis officia sequi magni sunt et obcaecati odit, aspernatur maiores?</p>
<p><ul>
    <li>Email : {{ $kontak['email'] }}</li>
    <li>Youtube : {{ $kontak['youtube'] }}</li>
</ul>
</p>
@endsection