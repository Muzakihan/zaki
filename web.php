<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\MengajarController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\SiswaController;
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

Route::get('/home', [IndexController::class, 'home']);

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index');
    Route::post('/login_admin', 'Admin');
    Route::post('/login_guru', 'Guru');
    Route::post('/login_siswa', 'Siswa');
    Route::get('/logout', 'logout');
});

Route::middleware(['CheckUserRole:Admin'])->group(function () {
    Route::controller(GuruController::class)->prefix('guru')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{guru}', 'edit');
        Route::post('/update/{guru}', 'update');
        Route::get('/destroy/{guru}', 'destroy');
    });

    Route::controller(MapelController::class)->prefix('mapel')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{mapel}', 'edit');
        Route::post('/update/{mapel}', 'update');
        Route::get('/destroy/{mapel}', 'destroy');
    });

    Route::controller(KelasController::class)->prefix('kelas')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{kelas}', 'edit');
        Route::post('/update/{kelas}', 'update');
        Route::get('/destroy/{kelas}', 'destroy');
    });

    Route::controller(SiswaController::class)->prefix('siswa')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{siswa}', 'edit');
        Route::post('/update/{siswa}', 'update');
        Route::get('/destroy/{siswa}', 'destroy');
    });

    Route::controller(MengajarController::class)->prefix('mengajar')->group(function () {
        Route::get('/index', 'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{mengajar}', 'edit');
        Route::post('/update/{mengajar}', 'update');
        Route::get('/destroy/{mengajar}', 'destroy');
    });
});

Route::middleware(['CheckUserRole:Guru,Siswa'])->group(function () {
    Route::controller(NilaiController::class)->prefix('nilai')->group(function () {
        Route::get('/index', 'index');
        Route::get('/kelas/{kelas}', 'kelas');
        Route::get('/create/{kelas}', 'create');
        Route::post('/store/{kelas}', 'store');
        Route::get('/edit/{kelas}/{nilai}', 'edit');
        Route::post('/update/{kelas}/{nilai}', 'update');
        Route::get('/destroy/{nilai}', 'destroy');
    });
});
