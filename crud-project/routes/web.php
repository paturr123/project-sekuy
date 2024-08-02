<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MuridController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [KelasController::class, 'index'])->name('index');

Route::post('/insertdata', [KelasController::class, 'insertdata'])->name('insertdata');

Route::get('/tampildata/{id}', [KelasController::class, 'tampildata'])->name('tampildata');
Route::post('/updatedata/{id}', [KelasController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [KelasController::class, 'delete'])->name('delete');

// bagian murid
Route::get('/murid', [MuridController::class, 'murid'])->name('murid');

Route::post('/tambahdata', [MuridController::class, 'tambahdata'])->name('tambahdata');

Route::get('/editmurid/{id}', [MuridController::class, 'editmurid'])->name('editmurid');
Route::post('/updatemurid/{id}', [MuridController::class, 'updatemurid'])->name('updatemurid');

Route::get('/hapus/{id}', [MuridController::class, 'hapus'])->name('hapus');

// bagian mapel
Route::get('/mapel', [MapelController::class, 'mapel'])->name('mapel');

Route::post('/tambahmapel', [MapelController::class, 'tambahmapel'])->name('tambahmapel');

Route::get('/editmapel/{id}', [MapelController::class, 'editmapel'])->name('editmapel');
Route::post('/updatemapel/{id}', [MapelController::class, 'updatemapel'])->name('updatemapel');

Route::get('/buang/{id}', [MapelController::class, 'buang'])->name('buang');

// bagian guru
Route::get('/guru', [GuruController::class, 'guru'])->name('guru');

Route::post('/tambahguru', [GuruController::class, 'tambahguru'])->name('tambahguru');
Route::get('/editguru/{id}', [GuruController::class, 'editguru'])->name('editguru');

Route::post('/updateguru/{id}', [GuruController::class, 'updateguru'])->name('updateguru');

Route::get('/hapusguru/{id}', [GuruController::class, 'hapusguru'])->name('hapusguru');

// AJAX Kelas
Route::post('/kelasajax', [KelasController::class, 'storeAjax'])->name('kelasajax.store');
