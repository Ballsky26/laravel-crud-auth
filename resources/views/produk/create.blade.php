@extends('layout.aplikasi')

@section('content')
<form method="POST" action="/produk" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="nomor_produk" class="form-label">Nomor Produk</label>
      <input type="text" class="form-control" name="nomor_produk" id="nomor_produk" value="{{ Session::get('nomor_produk') }}">
    </div>
    <div class="mb-3">
      <label for="nama_produk" class="form-label">Nama Produk</label>
      <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ Session::get('nama_produk') }}">
    </div>
    <div class="mb-3">
      <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
      <textarea class="form-control" name="deskripsi_produk" id="deskripsi_produk">{{ Session::get('deskripsi_produk') }}</textarea>
    </div>
    <div class="mb-3">
      <label for="foto_produk" class="form-label">Foto Produk</label>
      <input type="file" class="form-control" name="foto_produk" id="foto_produk">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
  </form>
@endsection