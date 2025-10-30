<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pasienController;
use App\Http\Controllers\JenisKamar;
use App\Http\Controllers\NamaKamar;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('/pasien', pasienController::class);
Route::resource('/jenis_kamar', JenisKamar::class);
Route::resource('/nama_kamar', NamaKamar::class);