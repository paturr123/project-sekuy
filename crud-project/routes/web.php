<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;

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