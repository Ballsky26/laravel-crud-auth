<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('produk')->insert([
            'nomor_produk' => "01",
            'nama_produk' => 'Olahan Ikan',
            'deskripsi_produk' => 'Enak Sekali',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('produk')->insert([
            'nomor_produk' => "02",
            'nama_produk' => 'Olahan Ayam',
            'deskripsi_produk' => 'Enak Sekali',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('produk')->insert([
            'nomor_produk' => "03",
            'nama_produk' => 'Olahan Sapi',
            'deskripsi_produk' => 'Enak Sekali',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('produk')->insert([
            'nomor_produk' => "04",
            'nama_produk' => 'Olahan Jagung',
            'deskripsi_produk' => 'Enak Sekali',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('produk')->insert([
            'nomor_produk' => "05",
            'nama_produk' => 'Olahan Buah',
            'deskripsi_produk' => 'Enak Sekali',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
