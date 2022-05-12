<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MainController;

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



Route::get('/', [App\Http\Controllers\InicioController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [App\Http\Controllers\InicioController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [App\Http\Controllers\InicioController::class, 'contacto'])->name('contacto');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
