<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;

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
    Route::get('/{id}/edit', [UserController::class, 'edit']);
    Route::post('/{id}/update', [UserController::class, 'update']);
    Route::get('/{id}/hapus', [UserController::class, 'destroy']);
});
Route::group(['prefix' => 'kelas', 'as' => 'kelas-'], function(){
    Route::get('/', 'ClassesController@index')->name('index');
    Route::post('/store', 'ClassesController@store')->name('store');
    Route::get('/get-data', 'ClassesController@data')->name('data');
    Route::get('/{id}/edit', 'ClassesController@edit');
    Route::post('/{id}/update', 'ClassesController@update');
    Route::get('/{id}/hapus', 'ClassesController@destroy');
});
Route::group(['prefix' => 'siswa', 'as' => 'siswa-'], function(){
    Route::get('/', 'StudentController@index')->name('index');
    Route::post('/store', 'StudentController@store')->name('store');
    Route::get('/get-data', 'StudentController@data')->name('data');
    Route::get('/{id}/edit', 'StudentController@edit');
    Route::post('/{id}/update', 'StudentController@update');
    Route::get('/{id}/hapus', 'StudentController@destroy');
});
Route::group(['prefix' => 'spp', 'as' => 'spp-'], function(){
    Route::get('/', 'SppController@index')->name('index');
    Route::post('/store', 'SppController@store')->name('store');
    Route::get('/get-data', 'SppController@data')->name('data');
    Route::get('/{id}/edit', 'SppController@edit');
    Route::post('/{id}/update', 'SppController@update');
    Route::get('/{id}/hapus', 'SppController@destroy');
});
Route::group(['prefix' => 'pembayaran', 'as' => 'pembayaran-'], function(){
    Route::get('/', 'PaymentController@index')->name('index');
    Route::post('/store', 'PaymentController@store')->name('store');
    Route::get('/get-data', 'PaymentController@data')->name('data');
    Route::get('/{id}/edit', 'PaymentController@edit');
    Route::post('/{id}/update', 'PaymentController@update');
    Route::get('/{id}/hapus', 'PaymentController@destroy');
});
Route::group(['prefix' => 'laporan', 'as' => 'laporan-'], function(){
    Route::get('/', 'UserController@index')->name('index');
    Route::get('/get-data', 'UserController@data')->name('data');
});