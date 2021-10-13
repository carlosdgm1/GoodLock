<?php

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\OperacionController;
use App\Http\Controllers\UsuariosController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


//ADMINISTRACION
Route::get('/Administracion', [AdministracionController::class, 'index'])->name('index-administracion');
Route::get('/Administracion/Crear_personal', [AdministracionController::class, 'indexAP'])->name('index-administracionP');
Route::get('/Administracion/Crear_residente', [AdministracionController::class, 'indexAR'])->name('index-administracionR');
//Create
Route::post('/Administracion/Crear_personal/Creando', [AdministracionController::class, 'createP'])->name('crear-administracionP');
Route::post('/Administracion/Crear_residente/Creando', [AdministracionController::class, 'createR'])->name('crear-administracionR');


//BUSQUEDA
Route::get('/Busqueda', [BusquedaController::class, 'index'])->name('index-busqueda');
Route::get('/Busqueda/Personal', [BusquedaController::class, 'indexP'])->name('index-busquedaP');
Route::get('/Busqueda/Residente', [BusquedaController::class, 'indexR'])->name('index-busquedaR');
Route::get('/Busqueda/Visitantes', [BusquedaController::class, 'indexV'])->name('index-busquedaV');
Route::get('/Busqueda/Residentes/Coresidente/{id}', [BusquedaController::class, 'indexCR'])->name('index-coresidente');
//Create
Route::post('/Busqueda/Residentes/Coresidente', [BusquedaController::class, 'createCR'])->name('crear-coresidente');
//Updates
Route::put('/Administracion/Buscar_personal/Detallado/{id}', [BusquedaController::class, 'updateP'])->name('update-personal');
Route::put('/Administracion/Buscar_residente/Detallado/{id}', [BusquedaController::class, 'updateR'])->name('update-residente');
Route::put('/Administracion/Buscar_visitantes/Detallado/{id}', [BusquedaController::class, 'updateV'])->name('update-visitantes');
Route::put('/Configuracion/Ip/{id}', [ConfiguracionController::class, 'update'])->name('modificar-cam');
Route::put('/Operacion/Actualizar_estatus/{id}', [OperacionController::class, 'estatus'])->name('estatusV');

//Delete
Route::delete('/Administracion/Buscar_personal/Eliminar/{id}', [BusquedaController::class, 'deleteP'])->name('eliminar-personal');
Route::delete('/Administracion/Buscar_residente/Eliminar/{id}', [BusquedaController::class, 'deleteR'])->name('eliminar-residente');


//OPERACION
Route::get('/Operacion', [OperacionController::class, 'index'])->name('index-visitante');
//Create
Route::post('/Operacion/Nueva_Visita', [OperacionController::class, 'createV'])->name('crear-visitante');


//USUARIOS
Route::get('/Usuarios', [UsuariosController::class, 'index'])->name('index-usuarios');
Route::get('/Usuarios/Registrar', [RegisteredUserController::class, 'create'])->name('index-register');
Route::post('/Usuarios/Registrar/usuario', [RegisteredUserController::class, 'store'])->name('register');

//CONFIGURACION
Route::get('/Configuracion', [ConfiguracionController::class, 'index'])->name('index-configuracion');
