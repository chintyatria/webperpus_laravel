<?php

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
    return view('auth/login');
}); 

Route::get('buku/tambah', "Perpustakaan@tambah");
Route::post('buku/simpan_tambah', "Perpustakaan@simpan_tambah");
Route::get('/buku', "Perpustakaan@index");
Route::get('/buku/cari', "Perpustakaan@cari");
Route::put('buku/update/', "Perpustakaan@update");
Route::get('buku/edit/{id_buku}', "Perpustakaan@edit");
Route::get('buku/hapus/{id_buku}', "Perpustakaan@hapus");
Auth::routes(); 
Route::get('/home', 'HomeController@index')->name('home');
Route::get('buku/pinjam/{id}', "Perpustakaan@pinjam");
Route::post('buku/proses_pinjam', "Perpustakaan@proses_pinjam");

// Route::get('buku/riwayat', "Perpustakaan@riwayat");

//GENRE

Route::get('genre', "Genre@index");
Route::get('/genre/cari_genre', "Genre@cari_genre");
Route::get('genre/tambah_genre', "Genre@tambah_genre");
Route::post('genre/simpan_tambah', "Genre@simpan_tambah");
Route::put('genre/update/', "Genre@update");
Route::get('genre/edit_genre/{id_genre}', "Genre@edit_genre");
Route::get('genre/hapus_genre/{id_genre}', "Genre@hapus_genre");

//RIWAYAT

Route::get('riwayat', "Riwayat@index");
Route::get('riwayat/edit_status/{id_pinjam}', "Riwayat@edit_status");
Route::put('riwayat/validateEditStatus', "Riwayat@validateEditStatus");