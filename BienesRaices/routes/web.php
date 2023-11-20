<?php

use App\Http\Controllers\AnunciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\UserController;

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

/*Route::get('/', function () {
    return view('index');
})->name('main');*/

Route::get('/',[GeneralController::class,'index'])->name('main');

Route::get('/nosotros',function(){
    return view('nosotros.index');
})->name('nosotros');

Route::get('/contacto',function(){
    return view('contacto.index');
})->name('contacto');

//Blog
Route::get('/blog', [EntradasController::class,'index'])->name('indexblog');
Route::get('/blog/{blog}/show',[EntradasController::class,'show'])->name('BlogShow');
Route::get('/blog/create',[EntradasController::class,'create'])->name('BlogCreate');
Route::post('/blog',[EntradasController::class,'store'])->name('BlogStore');
Route::get('/blog/{blog}/edit', [EntradasController::class,'edit'])->name('BlogEdit');
Route::patch('/blog/{blog}', [EntradasController::class,'update'])->name('BlogUpdate');
Route::delete('/blog/{blog}', [EntradasController::class,'destroy'])->name('BlogDestroy');

//Anuncios
Route::get('/anuncios',[AnunciosController::class,'index'])->name('AnunciosIndex');
Route::get('/anuncios/{anuncio}/show',[AnunciosController::class,'show'])->name('AnuncioShow');
Route::get('/anuncios/create',[AnunciosController::class,'create'])->name('AnunciosCreate');
Route::post('/anuncios',[AnunciosController::class,'store'])->name('AnunciosStore');
Route::get('/anuncios/{anuncio}/edit',[AnunciosController::class,'edit'])->name('AnunciosEdit');
Route::patch('/anuncios/{anuncio}',[AnunciosController::class,'update'])->name('AnunciosUpdate');
Route::delete('/anuncios/{anuncio}',[AnunciosController::class,'destroy'])->name('AnunciosDestroy');

//Auth
Route::get('/login',[UserController::class,'indexLogin'])->name('IndexLogin');
Route::post('/login',[UserController::class,'login'])->name('Login');
Route::get('/registro',[UserController::class,'indexRegistro'])->name('IndexRegistro');
Route::post('/registro',[UserController::class,'registro'])->name('Registro');