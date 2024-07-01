<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reserva', function () {
    return view('reserva');
});
Route::get('/administrador', function () {
    return view('admin_dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
use App\Http\Controllers\ClaseController;

Route::middleware(['auth'])->group(function () {
    Route::get('/clases', [ClaseController::class, 'index'])->name('clases.index');
    Route::get('/clases/create', [ClaseController::class, 'create'])->name('clases.create');
    Route::post('/clases', [ClaseController::class, 'store'])->name('clases.store');
    Route::get('/clases/listar', [ClaseController::class, 'listarClases'])->name('clases.list');
    Route::get('/clases/adminlist', [ClaseController::class, 'AdminlistarClases'])->name('clases.adminlist'); 
    Route::get('/clases/{clase}', [ClaseController::class, 'show'])->name('clases.show');
    Route::get('/clases/{clase}/edit', [ClaseController::class, 'edit'])->name('clases.edit');
    Route::put('/clases/{clase}', [ClaseController::class, 'update'])->name('clases.update');
    Route::delete('/clases/{clase}', [ClaseController::class, 'destroy'])->name('clases.destroy');
    Route::get('/clases/{clase}/participantes', [ClaseController::class, 'participantes'])->name('clases.participantes');
});

use App\Http\Controllers\ReservaController;

Route::get('/seleccionarCancha', [ReservaController::class, 'seleccionarCancha'])->name('seleccionarCancha');
Route::get('/reservar/{cancha}', [ReservaController::class, 'index'])->name('reservar');
Route::post('/reservar/{cancha}', [ReservaController::class, 'store'])->name('reservas.store');
Route::get('/getHorarios/{cancha}', [ReservaController::class, 'getHorarios']);
Route::post('/resumen', [ReservaController::class, 'resumen'])->name('resumen');
Route::get('/reservas/{id}', [ReservaController::class, 'show'])->name('reservas.show');
Route::get('/reservas', [ReservaController::class, 'listarReservas'])->name('reservas.index');
Route::delete('/reservas/{id}', [ReservaController::class, 'destroy'])->name('reservas.destroy');
Route::get('/mis-reservas', [ReservaController::class, 'listarReservasUsuario'])->name('reservas.usuario');
Route::post('/factura/store', [ReservaController::class, 'storeFactura'])->name('factura.store');

use App\Http\Controllers\InscripcionController;

Route::middleware(['auth'])->group(function () {
    Route::post('/clases/{clase}/inscribir', [InscripcionController::class, 'inscribir'])->name('inscripciones.inscribir');
    Route::get('/clases/{clase}/inscripcion', [InscripcionController::class, 'show'])->name('inscripciones.show');
    Route::get('/mis-clases', [InscripcionController::class, 'misClases'])->name('inscripciones.mis_clases');
    Route::get('/inscripciones/{inscripcion}/ver-pago', [InscripcionController::class, 'verPago'])->name('inscripciones.ver-pago');

});

use App\Http\Controllers\TorneoController;

Route::middleware(['auth'])->group(function () {
    Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
    Route::get('/torneos/create', [TorneoController::class, 'create'])->name('torneos.create');
    Route::post('/torneos', [TorneoController::class, 'store'])->name('torneos.store');
    Route::get('/torneos/{torneo}', [TorneoController::class, 'show'])->name('torneos.show');
    Route::get('/torneos/{torneo}/edit', [TorneoController::class, 'edit'])->name('torneos.edit');
    Route::put('/torneos/{torneo}', [TorneoController::class, 'update'])->name('torneos.update');
    Route::delete('/torneos/{torneo}', [TorneoController::class, 'destroy'])->name('torneos.destroy');
});

use App\Http\Controllers\InscribirseTorneoController;

Route::get('/inscribirsetorneo', [InscribirseTorneoController::class, 'listar'])->name('inscribirsetorneo.index');
Route::get('/inscribirsetorneo/{id_torneo}', [InscribirseTorneoController::class, 'show'])->name('inscribirsetorneo.show');
Route::post('/inscribirsetorneo/{id_torneo}/inscribirse', [InscribirseTorneoController::class, 'inscribirse'])->name('inscribirsetorneo.inscribirse');

use App\Http\Controllers\PartidoController;

Route::post('/torneo/{idTorneo}/asignar-ronda1', [PartidoController::class, 'ejecutarRonda1'])->name('asignarRonda1');
Route::get('/torneo/{idTorneo}/asignar-ronda1', [PartidoController::class, 'mostrarVistaRonda1'])->name('mostrarVistaRonda1');
Route::get('/torneo/{idTorneo}/partidos', [PartidoController::class, 'listarPartidos'])->name('listarPartidos');
Route::get('/torneo/{idTorneo}/partidos-ronda1/{nroPartido}/subir-resultado-ronda2', [PartidoController::class, 'mostrarSubirResultadoRonda2'])->name('mostrarSubirResultadoRonda2');
Route::post('/torneo/{idTorneo}/partidos-ronda1/{nroPartido}/subir-resultado-ronda2', [PartidoController::class, 'subirResultadoRonda2'])->name('subirResultadoRonda2');
Route::get('/torneo/{idTorneo}/partido/{nroPartido}/subir-resultado-ronda3', [PartidoController::class, 'mostrarSubirResultadoRonda3'])->name('mostrarSubirResultadoRonda3');
Route::post('/torneo/{idTorneo}/partido/{nroPartido}/subir-resultado-ronda3', [PartidoController::class, 'subirResultadoRonda3'])->name('subirResultadoRonda3');

require __DIR__.'/auth.php';
