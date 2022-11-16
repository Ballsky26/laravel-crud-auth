<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = ProdukModel::all();
        $data = ProdukModel::orderBy('nomor_produk', 'asc')->paginate(5);
        return view('produk.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nomor_produk', $request->nomor_produk);
        Session::flash('nama_produk', $request->nama_produk);
        Session::flash('deskripsi_produk', $request->deskripsi_produk);

        $request->validate([
            'nomor_produk' => 'required|numeric',
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'foto_produk' => 'required|mimes:jpeg,jpg,png,gif'
        ], [
            'nomor_produk.required' => 'Nomor Produk Wajib diisi',
            'nomor_produk.numeric' => 'Nomor Produk hanya bisa diisi angka',
            'nama_produk.required' => 'Nama Produk Wajib diisi',
            'deskripsi_produk.required' => 'Deskripsi Produk Wajib diisi',
            'foto_produk.required' => 'Foto Produk Wajib diisi',
            'foto_produk.mimes' => 'Foto hanya bisa di upload dengan format JPEG, JPG, PNG, GIF',

        ]);
        $foto_produk_file = $request->file('foto_produk');
        $foto_produk_ekstensi = $foto_produk_file->extension();
        $foto_produk_nama = date('ymdhis') . "." . $foto_produk_ekstensi;
        $foto_produk_file->move(public_path('foto_produk'), $foto_produk_nama);
        $data = [
            'nomor_produk' => $request->input('nomor_produk'),
            'nama_produk' => $request->input('nama_produk'),
            'deskripsi_produk' => $request->input('deskripsi_produk'),
            'foto_produk' => $foto_produk_nama
        ];
        ProdukModel::create($data);
        return redirect('produk')->with('success', 'Berhasil Input Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return "<p>Ini adalah Produk olahan dengan id $id</p>";
        $data = ProdukModel::where('nomor_produk', $id)->first();
        return view('produk.detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProdukModel::where('nomor_produk', $id)->first();
        return view('produk.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required'
        ], [
            'nama_produk.required' => 'Nama Produk Wajib diisi',
            'deskripsi_produk.required' => 'Deskripsi Produk Wajib diisi',
        ]);
        $data = [
            'nama_produk' => $request->input('nama_produk'),
            'deskripsi_produk' => $request->input('deskripsi_produk'),
        ];
        if ($request->hasFile('foto_produk')) {
            $request->validate(
                [
                    'foto_produk' => 'mimes:jpeg,jpg,png,gif',
                    [
                        'foto_produk.mimes' => 'Foto hanya bisa di upload dengan format JPEG, JPG, PNG, GIF',
                    ]
                ]
            );
            $foto_produk_file = $request->file('foto_produk');
            $foto_produk_ekstensi = $foto_produk_file->extension();
            $foto_produk_nama = date('ymdhis') . "." . $foto_produk_ekstensi;
            $foto_produk_file->move(public_path('foto_produk'), $foto_produk_nama);
            // Sudah terupload ke direktori

            $data_foto_produk = ProdukModel::where('nomor_produk', $id)->first();
            File::delete(public_path('foto_produk') . '/' . $data_foto_produk->foto_produk);

            // $data = [
            //     'foto_produk' => $foto_produk_nama
            // ];
            $data['foto_produk'] = $foto_produk_nama;
        }
        ProdukModel::where('nomor_produk', $id)->update($data);
        return redirect('produk')->with('success', 'Berhasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ProdukModel::where('nomor_produk', $id)->first();
        File::delete(public_path('foto_produk') . '/' . $data->foto_produk);
        ProdukModel::where('nomor_produk', $id)->delete();
        return redirect('produk')->with('success', 'Berhasil Hapus Data');
    }
}
