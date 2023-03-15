<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class, 'promotions'])->name('promotions');
Route::get('/index', [PagesController::class, 'promotions'])->name('promotions');
Route::get('/iniciarSesion', [PagesController::class, 'iniciarSesion'])->name('inciarSesion');

Route::post('/inscripcion', [PromotionsController::class, 'inscripcion'])->name('inscripcion');

Route::get('/inscritos', [PromotionsController::class, 'inscritos'])
->name('inscritos')
->middleware('auth');

Route::post('/rangoFecha', [PromotionsController::class, 'porFecha'])
->name('rangoFecha')
->middleware('auth');

Route::get('/dashboard', [PromotionsController::class, 'dashboard'])
->name('dashboard')
->middleware('auth');

Route::get('/vistas', [PromotionsController::class, 'contador'])
->name('vistas')
->middleware('auth');

Route::get('/porCiudad', [PromotionsController::class, 'porCiudad'])
->name('porCiudad')
->middleware('auth');

Route::get('/porMes', [PromotionsController::class, 'porMes'])
->name('porMes')
->middleware('auth');

Route::post('/login',[UserController::class, 'login'] )->name('login');
Route::get('/logout',[UserController::class, 'logout'] )->name('logout');


