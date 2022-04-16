<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/pertemuan-pertama', [HomeController::class, 'pertemuanpertama']);
Route::get('/tugas-pertama', [HomeController::class, 'tugaspertama']);
Route::post('/gaji/save', [HomeController::class, 'saveGaji']);
Route::get('/uts', [HomeController::class, 'uts']);
Route::post('/nilai/save', [HomeController::class, 'saveNilai']);
Route::get('/thr', [HomeController::class, 'uas']);
Route::get('/thr/tambah', [HomeController::class, 'tambahThr']);
Route::get('/thr/hapus/{id}', [HomeController::class, 'hapus'])->where('id', '[0-9]+');
Route::post('/thr/save', [HomeController::class, 'saveThr']);
