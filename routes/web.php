<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanghayController;

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

Route::get('/banghay', [BanghayController::class, 'index']);
Route::post('/uploadfile', [BanghayController::class, 'store']);
Route::get('/show', [BanghayController::class, 'show']);
Route::get('/download/{file}', [BanghayController::class, 'download']);
Route::get('/preview/{id}', [BanghayController::class, 'preview']);



Route::get('/banghay/gradeone', [BanghayController::class, 'gradeone']);
Route::get('/banghay/gradetwo', [BanghayController::class, 'gradetwo']);
Route::get('/banghay/gradethree', [BanghayController::class, 'gradethree']);
Route::get('/banghay/gradefour', [BanghayController::class, 'gradefour']);
Route::get('/banghay/gradefive', [BanghayController::class, 'gradefive']);
Route::get('/banghay/gradesix', [BanghayController::class, 'gradesix']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
