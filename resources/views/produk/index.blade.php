@extends('layout.aplikasi')

@section('content')

<a href="/produk/create" class="btn btn-success">Tambah Data</a>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Deskripsi Produk</th>
            <th>Foto Produk</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $key=>$item)
            <tr>
                <td>{{$key + 1}}</th>
                <td>{{ $item->nama_produk }}</td>
                <td>{{ $item->deskripsi_produk }}</td>
                <td>
                    @if ($item->foto_produk)
                    <img style="max-width:100px;max-height:100px" src="{{ url('foto_produk'). '/'. $item->foto_produk }}"/>
                @endif
                 </td>
                <td><a class="btn btn-secondary btn-sm" href='{{ url('/produk/'.$item->nomor_produk) }}'>Detail</a>
                <a class="btn btn-warning btn-sm" href='{{ url('/produk/'.$item->nomor_produk. '/edit') }}'>Edit</a>
            <form class="d-inline" onsubmit ="return confirm ('Apakah Data mau di hapus?')" action="{{ '/produk/' . $item->nomor_produk }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Hapus</button>
            </form></td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $data->links() }}    
@endsection