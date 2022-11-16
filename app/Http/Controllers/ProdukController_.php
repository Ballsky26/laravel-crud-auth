<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        // $data = ProdukModel::all();
        $data = ProdukModel::orderBy('nomor_produk', 'asc')->paginate(3);
        return view('produk.index')->with('data', $data);
    }
    public function detail($id)
    {
        // return "<p>Ini adalah Produk olahan dengan id $id</p>";
        $data = ProdukModel::where('nomor_produk', $id)->first();
        return view('produk.detail')->with('data', $data);
    }
    public function create()
    {
    }
    public function delete()
    {
    }
}
