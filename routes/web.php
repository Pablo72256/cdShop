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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\InicioController::class, 'inicio'])->name('inicio');
Route::get('/nosotros', [App\Http\Controllers\InicioController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [App\Http\Controllers\InicioController::class, 'contacto'])->name('contacto');

Route::resource('articulos', 'App\Http\Controllers\ArticuloController')->middleware('auth');

Route::resource('inventario', 'App\Http\Controllers\InventarioController')->middleware('auth');

Route::get('/carrito', [App\Http\Controllers\CarritoController::class, 'carrito'])->name('carrito')->middleware('auth');

