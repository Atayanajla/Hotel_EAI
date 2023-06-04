<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Tempat untuk menyimpan API
Route::get('/show/hotel', [HotelController::class, "showHotel"]);
Route::get('/show/hotel/detail/{id}', [HotelController::class, "showById"]);
Route::post('/create/hotel', [HotelController::class, "tambah_hotel"]);
Route::delete('/delete/detail/{id}', [HotelController::class, "hapus_hotel"]);
Route::get('/show/lokasi/hotel', [HotelController::class, "cari_lokasi"]);
Route::put('/edit/hotel/{id}', [HotelController::class, "edit_hotel"]);
