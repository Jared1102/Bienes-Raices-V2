<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradasController;
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
    return view('index');
})->name('main');

Route::get('/nosotros',function(){
    return view('nosotros.index');
})->name('nosotros');

Route::get('/contacto',function(){
    return view('contacto.index');
})->name('contacto');
Route::get('/blog', [EntradasController::class,'index'])->name('indexblog');