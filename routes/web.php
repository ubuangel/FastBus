<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AcercaController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\SelectviajeController;
use App\Http\Controllers\TerminosController;
use App\Http\Controllers\ReservaController;

Route::get('/', function () {
    return view('welcome');
});
/*Arreglado*/
Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/busquedaviajes',[HomeController::class,'buscar_viajes_cliente'])->name('buscar_viajes_cliente');
Route::get('/acerca', [AcercaController::class, 'index'])->name('acerca');
Route::get('/soporte', [SoporteController::class, 'index'])->name('soporte');

/*Direcciones de sleeccion de bus y viaje*/
Route::get('/seleccionarviaje/{id_viaje}',
[SelectviajeController::class, 'seleccionarbus'])->name('seleccionarbus');
Route::get('/seleccionarviaje/{id_viaje}/{id_bus}',
[SelectviajeController::class, 'elegirasientos'])->name('elegirasientos');
Route::get('/seleccionarviaje/{id_viaje}/{id_bus}/confirmardatos',
[SelectviajeController::class, 'confirmar'])->name('confirmardatos');

/*Direcciones de reserva*/
Route::get('/selectviaje/{id_viaje}/{id_bus}/confirmarreserva',
[ReservaController::class, 'confirmacion'])->name('confirmarreserva');
Route::get('/selectviaje/{id_viaje}/{id_bus}/reservando',
[ReservaController::class, 'reservar'])->name('realizarreserva');
Route::get('/reservas',
[ReservaController::class, 'index'])->name('administrarreservas');
Route::get('/cancelarreserva/{id_bus}/{num_asiento}',
[ReservaController::class, 'cancelar'])->name('cancelarreserva');
Route::get('/busquedareservas',[ReservaController::class,'buscar_reservas'])->name('buscar_reservas');

Route::get('/terminos', [TerminosController::class, 'index'])->name('terminos');
Route::resource('/ruta', App\Http\Controllers\RutumController::class)->middleware('auth');
Route::resource('/viajes', App\Http\Controllers\ViajeController::class)->middleware('auth');
Route::resource('/buses', App\Http\Controllers\BusController::class)->middleware('auth');
