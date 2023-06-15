<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;

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
    return redirect()->route('dashboard');
})->middleware('auth')->name('welcome');

// Rutas de registro
Route::get('register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//Rutas para Login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->middleware('auth')->name('logout');


Route::get('/dashboard', [ConcertController::class, 'index'])->name('dashboard');

//Rutas de conciertos
Route::post('/concert', [ConcertController::class, 'store'])->name('concert');
Route::get('concert', [ConcertController::class, 'create'])->name('concert.create');
Route::post('concert-search', [ConcertController::class, 'searchDate'])->name('concert.search');
Route::get('/concert-list', [ConcertController::class, 'concertsList'])->name('concert.list');

//ruta detalle de compras
Route::get('/my-concerts', [ConcertController::class, 'myConcerts'])->name('client.concerts');

// Order Concerts
Route::get('/concert-order/{id}', [TickerReservationController::class, 'create'])->name('concert.order');
