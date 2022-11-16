<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;
    protected $table = "produk";
    protected $fillable = ['nomor_produk', 'nama_produk', 'deskripsi_produk', 'foto_produk'];
}
