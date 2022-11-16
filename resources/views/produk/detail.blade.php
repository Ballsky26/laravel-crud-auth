@extends('layout.aplikasi')

@section('content')
<div>
    <h1>{{ $data->nama_produk }}</h1>
    @if ($data->foto_produk)
                    <img style="max-width:100px;max-height:100px" src="{{ url('foto_produk'). '/'. $data->foto_produk }}"/>
                @endif
    <p>
        <b>Nomor Produk :</b> {{ $data->nomor_produk }}
    </p>
    <p>
        <b>Deskripsi Produk :</b> {{ $data->deskripsi_produk }}
    </p>
    <a href="/produk" class="btn btn-primary btn-sm">Kembali</a>
</div>  
@endsection