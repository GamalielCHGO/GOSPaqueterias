<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::get('/terminos', [App\Http\Controllers\homeController::class, 'terminos'])->name('terminos');
Route::get('/rastrear', [App\Http\Controllers\HomeController::class, 'rastrear'])->name('rastrear');
Route::post('/rastrear', [App\Http\Controllers\HomeController::class, 'rastrearId'])->name('rastrear');


Route::get('/administrar', [App\Http\Controllers\AdministrarController::class, 'index'])->name('administrar');


// usuarios
Route::get('/crearUsuario',[App\Http\Controllers\UserController::class, 'create'])->name('crearUsuario');
Route::post('/crearUsuario','App\Http\Controllers\UserController@store')->name('crearUsuario.store');
Route::get('/listaUsuarios',[App\Http\Controllers\UserController::class, 'index'])->name('listaUsuarios');
Route::get('/usuario/{user}','App\Http\Controllers\UserController@show')->name('usuario');
Route::patch('/usuario/editar/{user}','App\Http\Controllers\UserController@update')->name('editarUsuario.update');
Route::post('/usuario/actualizarPass','App\Http\Controllers\UserController@updatePass')->name('updatePass');
Route::delete('/usuario/{user}','App\Http\Controllers\UserController@destroy')->name('user.destroy');
Route::get('/perfil','App\Http\Controllers\UserController@perfil')->name('perfil');

// sucursales
Route::get('/crearSucursal',[App\Http\Controllers\SucursalController::class, 'create'])->name('crearSucursal');
Route::post('/crearSucursal','App\Http\Controllers\SucursalController@store')->name('crearSucursal.store');
Route::get('/listaSucursales',[App\Http\Controllers\SucursalController::class, 'index'])->name('listaSucursales');
Route::get('/sucursal/{sucursal}','App\Http\Controllers\SucursalController@show')->name('sucursal');
Route::patch('/sucursal/editar/{sucursal}','App\Http\Controllers\SucursalController@update')->name('editarSucursal.update');
Route::delete('/sucursal/{sucursal}','App\Http\Controllers\SucursalController@destroy')->name('sucursal.destroy');

// costos
Route::get('/crearCosto',[App\Http\Controllers\CostoController::class, 'create'])->name('crearCosto');
Route::post('/crearCosto','App\Http\Controllers\CostoController@store')->name('crearCosto.store');
Route::get('/listaCostos',[App\Http\Controllers\CostoController::class, 'index'])->name('listaCostos');
Route::get('/costo/{costo}','App\Http\Controllers\CostoController@show')->name('costo');
Route::patch('/costo/editar/{costo}','App\Http\Controllers\CostoController@update')->name('editarCosto.update');
Route::delete('/costo/{costo}','App\Http\Controllers\CostoController@destroy')->name('costo.destroy');


// envios
Route::get('/crearEnvio',[App\Http\Controllers\EnvioController::class, 'create'])->name('crearEnvio');
Route::post('/crearEnvio','App\Http\Controllers\EnvioController@store')->name('crearEnvio.store');
Route::get('/listaEnvios',[App\Http\Controllers\EnvioController::class, 'index'])->name('listaEnvios');
Route::get('/envio/{envio}','App\Http\Controllers\EnvioController@show')->name('envio');
Route::patch('/envio/editar/{envio}','App\Http\Controllers\EnvioController@update')->name('editarEnvio.update');
Route::delete('/envio/{envio}','App\Http\Controllers\EnvioController@destroy')->name('envio.destroy');
// unidades
Route::get('/listaUnidades','App\Http\Controllers\EnvioController@listaUnidades')->name('listaUnidades');
Route::get('/listaEnviosUnidad','App\Http\Controllers\EnvioController@listaEnviosUnidad')->name('listaEnviosUnidad');


// Creacion de archivo excel
Route::post('/exportarExcel',[App\Http\Controllers\EnvioController::class, 'createExcel'])->name('exportarExcel');




// entregas
Route::get('/listaEntrega','App\Http\Controllers\EnvioController@listaEntrega')->name('listaEntrega');
Route::post('/listaEntrega','App\Http\Controllers\EnvioController@listaEntregaFecha')->name('listaEntrega');
Route::get('/listaEntregaSucursal','App\Http\Controllers\EnvioController@listaEntregaSucursal')->name('listaEntregaSucursal');
Route::get('/entrega/{envio}','App\Http\Controllers\EnvioController@entrega')->name('entrega');
Route::post('/procesarEntrega/{envio}','App\Http\Controllers\EnvioController@procesarEntrega')->name('procesarEntrega');


// enviar unidad
Route::get('/enviarUnidad','App\Http\Controllers\EnvioController@enviarUnidad')->name('enviarUnidad');
Route::post('/enviarUnidad','App\Http\Controllers\EnvioController@procesarUnidad')->name('enviarUnidad');

// recibir unidad sucursal
Route::get('/recibirUnidad','App\Http\Controllers\EnvioController@recibirUnidad')->name('recibirUnidad');
Route::post('/recibirUnidad','App\Http\Controllers\EnvioController@procesarReciboUnidad')->name('recibirUnidad');



Route::get('/envioLectura/{envio}','App\Http\Controllers\EnvioController@envioLectura')->name('envioLectura');
Route::post('/procesarEnvio/{envio}','App\Http\Controllers\EnvioController@procesar')->name('procesarEnvio');


//paquetes
Route::get('/agregarPaquetes/{envio}',[App\Http\Controllers\PaqueteController::class, 'create'])->name('agregarPaquetes');
Route::post('/agregarPaquete','App\Http\Controllers\PaqueteController@store')->name('agregarPaquete.store');
Route::delete('/eliminarPaquete/{paquete}','App\Http\Controllers\PaqueteController@destroy')->name('eliminarPaquete');





