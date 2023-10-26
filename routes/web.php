<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/fakultas', function(){
//     return view('fakultas');
// });
Route::resource('fakultas',FakultasController::class);

// Route::get('/prodi', function(){
//     return view('prodi');
// });
Route::resource('prodi',ProdiController::class);

// Route::get('/mahasiswa', function(){
//     $data=[
//         ["npm" => 2226250063, "nama" => "Lianto"],
//         ["npm" => 2226250066, "nama" => "Kipen"],
//         ["npm" => 2226250030, "nama" => "Roberto"]
//     ];
//     return view('mahasiswa.index')->with('mahasiswa', $data);
// });
Route::resource('mahasiswa',MahasiswaController::class);
