<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', [Controller::class, 'index'])->name('index');
Route::group(['prefix' => 'pengguna', 'as' => 'pengguna-'], function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/get-data', [UserController::class, 'data'])->name('data');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [UserController::class, 'update'])->name('update');
    Route::get('/{id}/hapus', [UserController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'kelas', 'as' => 'kelas-'], function(){
    Route::get('/', [ClassesController::class, 'index'])->name('index');
    Route::post('/store', [ClassesController::class, 'store'])->name('store');
    Route::get('/get-data', [ClassesController::class, 'data'])->name('data');
    Route::get('/{id}/edit', [ClassesController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [ClassesController::class, 'update'])->name('update');
    Route::get('/{id}/hapus', [ClassesController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'siswa', 'as' => 'siswa-'], function(){
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::post('/store', [StudentController::class, 'store'])->name('store');
    Route::get('/get-data', [StudentController::class, 'data'])->name('data');
    Route::get('/{nisn}', [StudentController::class, 'read'])->name('read');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [StudentController::class, 'update'])->name('update');
    Route::get('/{id}/hapus', [StudentController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'spp', 'as' => 'spp-'], function(){
    Route::get('/', [SppController::class, 'index'])->name('index');
    Route::post('/store', [SppController::class, 'store'])->name('store');
    Route::get('/get-data', [SppController::class, 'data'])->name('data');
    Route::get('/{id}/edit', [SppController::class, 'edit'])->name('edit');
    Route::post('/{id}/update', [SppController::class, 'update'])->name('update');
    Route::get('/{id}/hapus', [SppController::class, 'destroy'])->name('destroy');
});
Route::group(['prefix' => 'pembayaran', 'as' => 'pembayaran-'], function(){
    Route::get('/', [PaymentController::class, 'index'])->name('index');
    Route::post('/store', [PaymentController::class, 'store'])->name('store');
    Route::get('/get-data', [PaymentController::class, 'data'])->name('data');
    Route::post('/get-spp', [PaymentController::class, 'spp'])->name('spp');
    Route::post('/get-payment', [PaymentController::class, 'payment'])->name('payment');
    Route::get('/{id}/hapus', [PaymentController::class, 'destroy'])->name('destroy');
    Route::post('/export', [PaymentController::class, 'export'])->name('export');
});