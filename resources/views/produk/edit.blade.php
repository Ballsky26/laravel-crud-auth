@extends('layout.aplikasi')

@section('content')
<form method="POST" action="{{ '/produk/' . $data->nomor_produk }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="mb-3">
      <h2>Nomor Induk : {{ $data->nomor_produk }}</h2>
    </div>
    <div class="mb-3">
      <label for="nama_produk" class="form-label">Nama Produk</label>
      <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $data->nama_produk }}">
    </div>
    <div class="mb-3">
      <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
      <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk">{{ $data->deskripsi_produk }}</textarea>
    </div>
    @if ($data->foto_produk)
        <div class="mb-3">
          <img style="max-width:100px;max-height:100px" src=" {{ url('foto_produk') .'/'.$data->foto_produk }}"/>
        </div>
    @endif
    <div class="mb-3">
      <label for="foto_produk" class="form-label">Foto Produk</label>
      <input type="file" class="form-control" name="foto_produk" id="foto_produk">
    </div>
    <a href="/produk" class="btn btn-secondary">Batal</a>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection