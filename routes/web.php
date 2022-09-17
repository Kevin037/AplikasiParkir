<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\BlokController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index']);
// Route::get('/testapi',[ApiController::class,'json_parkir_masuk']);

Route::get('/blok',[BlokController::class,'index']);
Route::post('/tambah-blok',[BlokController::class,'tambah']);
Route::get('/form-edit-blok{id}',[BlokController::class,'form_edit']);
Route::post('/update-blok{id}',[BlokController::class,'update']);
Route::get('/hapus-blok{id}',[BlokController::class,'hapus']);

Route::get('/slot',[SlotController::class,'index']);
Route::post('/tambah-slot',[SlotController::class,'tambah']);
Route::get('/form-edit-slot{id}',[SlotController::class,'form_edit']);
Route::post('/update-slot{id}',[SlotController::class,'update']);
Route::get('/hapus-slot{id}',[SlotController::class,'hapus']);

Route::get('/jenis-kendaraan',[JenisKendaraanController::class,'index']);
Route::post('/tambah-jenis-kendaraan',[JenisKendaraanController::class,'tambah']);
Route::get('/form-edit-jenis-kendaraan{id}',[JenisKendaraanController::class,'form_edit']);
Route::post('/update-jenis-kendaraan{id}',[JenisKendaraanController::class,'update']);

Route::get('/data-slot',[SlotController::class,'data_slot']);
Route::get('/data-blok',[BlokController::class,'data_blok']);
Route::get('/detail-slot{id}',[SlotController::class,'detail_slot']);

Route::get('/parkir-masuk',[TransaksiController::class,'index']);
Route::get('/parkir-keluar',[TransaksiController::class,'parkir_keluar']);
Route::post('/tambah-parkir',[TransaksiController::class,'tambah']);
Route::get('/selesai-parkir{id}',[TransaksiController::class,'selesai_parkir']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
