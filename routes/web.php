<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\ProfesorController;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [AlumnoController::class, 'index'])->name('index');
Route::get('/utlag.login', [AlumnoController::class, 'login'])->name('login')->middleware('guest');
Route::post('/utlag.datos', [AlumnoController::class, 'datos'])->name('datos');
Route::get('/utlag.menulog/{nom?}', [AlumnoController::class, 'menulog'])->name('menulog')->middleware('auth');
Route::get('/utlag.logout', [AlumnoController::class, 'logout'])->name('logout');
Route::get('/layouts', [AlumnoController::class, 'layaout']);
Route::resource('/admin', AdminController::class);
Route::resource('/docente', ProfesorController::class);
Route::resource('/user', UserController::class);

