<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('data_parkir_masuk',[ApiController::class,'json_parkir_masuk']);
Route::get('data_parkir_keluar',[ApiController::class,'json_parkir_keluar']);
Route::get('data_slot_kosong',[ApiController::class,'json_data_slot_kosong']);
Route::get('data_blok_slot',[ApiController::class,'json_blok_slot']);

