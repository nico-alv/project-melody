<?php

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TicketReservationController;
use App\Http\Controllers\TicketController;

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

//Rutas de acceso "Usuario"
Route::middleware(['auth', 'can:viewUserDashboard'])->group(function () {
    // Rutas de conciertos
    Route::post('/concert-list', [ConcertController::class, 'searchDate'])->name('concert.search');
    Route::get('/concert-list', [ConcertController::class, 'concertsList'])->name('concert.list');

    // Order Concerts
    Route::get('/concert-order/{id}', [TicketReservationController::class, 'create'])->name('concert.order');
    Route::post('/concert-order/{id}', [TicketReservationController::class, 'store'])->name('concert.order.pay');
    Route::get('/my-concerts', [ConcertController::class, 'myConcerts'])->name('client.concerts');

    // Rutas de visualización y descarga de PDFs
    Route::get('/ticket/{id}', [TicketController::class, 'generatePDF'])->name('generate.pdf');
});



//Rutas de acceso "Administrador"
Route::middleware(['auth', 'can:viewAdminDashboard'])->group(function () {
    //Rutas de conciertos
    Route::post('/concert', [ConcertController::class, 'store'])->name('concert');
    Route::get('concert', [ConcertController::class, 'create'])->name('concert.create');
    Route::get('/collection', [TicketController::class, 'showCollection'])->name('collection');
    //Rutas de busqueda de clientes
    Route::get('/clients', [ConcertController::class, 'clients'])->name('clients.list');
    Route::get('/client-search', [ConcertController::class, 'searchClient'])->name('clients.search');

});

// Descarga de PDF
Route::get('descargar-pdf/{id}', [TicketController::class, 'downloadPDF'])->name('pdf.descargar');
// Control de errores

Route::get('/error-404', function () {
    return view('errors.404');
})->name('error-404');

Route::any('{any}', function () {
    return view('errors.404');
})->middleware('auth')->where('any', '.*');
