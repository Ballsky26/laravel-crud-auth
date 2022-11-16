<?php

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/produk', function () {
//     return "<h1>Produk</h1>";
// });

// Route::get('/produk/{id}', function ($id) {
//     return "<h1>ini adalah Produk dengan ID $id</h1>";
// })->where('id', '[0-9]+');

// Route::get('/produk/{id}/{nama}', function ($id, $nama) {
//     return "<h1>ini adalah Produk dengan ID $id dan Nama $nama</h1>";
// })->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);

// Route::get('produk', [ProdukController::class, 'index']);
// Route::get('produk/{id}', [ProdukController::class, 'detail'])
//     ->where('id', '[0-9]+');


Route::get('/', [HalamanController::class, 'index']);
Route::get('/kontak', [HalamanController::class, 'kontak']);
Route::get('/tentang', [HalamanController::class, 'tentang']);

Route::resource('produk', ProdukController::class)->middleware('isLogin');

Route::get('/sesi', [SessionController::class, 'index'])->middleware('isTamu');
Route::post('/sesi/login', [SessionController::class, 'login'])->middleware('isTamu');
Route::get('/sesi/logout', [SessionController::class, 'logout']);
Route::get('/sesi/register', [SessionController::class, 'register'])->middleware('isTamu');
Route::post('/sesi/create', [SessionController::class, 'create'])->middleware('isTamu');
