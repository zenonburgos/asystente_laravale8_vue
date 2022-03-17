<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;

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
    return view('contenido/contenido');
});

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category/registrar', [CategoryController::class, 'store']);
Route::put('/category/actualizar', [CategoryController::class, 'update']);
Route::put('/category/desactivar', [CategoryController::class, 'desactivar']);
Route::put('/category/activar', [CategoryController::class, 'activar']);
Route::get('/category/selectCategoria', [CategoryController::class, 'selectCategoria']);

Route::get('/articulo', [ArticuloController::class, 'index']);
Route::post('/articulo/registrar', [ArticuloController::class, 'store']);
Route::put('/articulo/actualizar', [ArticuloController::class, 'update']);
Route::put('/articulo/desactivar', [ArticuloController::class, 'desactivar']);
Route::put('/articulo/activar', [ArticuloController::class, 'activar']);

Route::get('/cliente', [ClienteController::class, 'index']);
Route::post('/cliente/registrar', [ClienteController::class, 'store']);
Route::put('/cliente/actualizar', [ClienteController::class, 'update']);

Route::get('/proveedor', [ProveedorController::class, 'index']);
Route::post('/proveedor/registrar', [ProveedorController::class, 'store']);
Route::put('/proveedor/actualizar', [ProveedorController::class, 'update']);

Route::get('/rol', [RolController::class, 'index']);


//O también:
//Route::get('/category', 'App\Http\Controllers\CategoryController@index');
//Es para versiones anteriores pero funciona

