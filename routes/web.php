<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alumnoController;




Route::get('/',[alumnoController::class,'index'])->name('index');

Route::get('/login',[alumnoController::class,'login'])->name('login')->middleware('guest');

Route::post('/datos',[alumnoController::class,'datos'])->name('datos');

Route::get('/contacto',[alumnoController::class,'contacto'])->name('contacto');

Route::get('/carrera',[alumnoController::class,'carreras'])->name('carreras');

Route::get('/menulog/{nom?}',[alumnoController::class,'menulog'])->name('menulog')->middleware('auth');

Route::get('/logout',[alumnoController::class,'logout'])->name('logout');

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
