<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;

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

Route::group(['middleware'=>['guest']],function(){
    Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
});

Route::group(['middleware'=>['auth']],function(){

    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController');
    //Notificaciones
    Route::post('/notification/get', [NotificationController::class, 'get']);
    
    Route::get('/main', function () {
        return view('contenido/contenido');
    })->name('main');

    Route::group(['middleware' => ['ControlInterno']], function () {
        
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
        Route::get('/articulo/buscarArticulo', [ArticuloController::class, 'buscarArticulo']);
        Route::get('/articulo/listarArticulo', [ArticuloController::class, 'listarArticulo']);
        Route::get('/articulo/listarPdf',[ArticuloController::class, 'listarPdf'])->name('articulos_pdf');

        Route::get('/proveedor', [ProveedorController::class, 'index']);
        Route::post('/proveedor/registrar', [ProveedorController::class, 'store']);
        Route::put('/proveedor/actualizar', [ProveedorController::class, 'update']);
        Route::get('/proveedor/selectProveedor', [ProveedorController::class, 'selectProveedor']);

        Route::get('/ingreso', [IngresoController::class, 'index']);
        Route::post('/ingreso/registrar', [IngresoController::class, 'store']);
        Route::put('/ingreso/desactivar', [IngresoController::class, 'desactivar']);
        Route::put('/ingreso/activar', [IngresoController::class, 'activar']);
        Route::get('/ingreso/obtenerCabecera', [IngresoController::class, 'obtenerCabecera']);
        Route::get('/ingreso/obtenerDetalles', [IngresoController::class, 'obtenerDetalles']);
    });
    
    Route::group(['middleware' => ['Vendedor']], function () {

        Route::get('/cliente', [ClienteController::class, 'index']);
        Route::post('/cliente/registrar', [ClienteController::class, 'store']);
        Route::put('/cliente/actualizar', [ClienteController::class, 'update']);
        Route::get('/cliente/selectCliente', [ClienteController::class, 'selectCliente']);

        Route::get('/articulo/buscarArticuloVenta', [ArticuloController::class, 'buscarArticuloVenta']);
        Route::get('/articulo/listarArticuloVenta', [ArticuloController::class, 'listarArticuloVenta']);

        Route::get('/venta', [VentaController::class, 'index']);
        Route::post('/venta/registrar', [VentaController::class, 'store']);
        Route::put('/venta/desactivar', [VentaController::class, 'desactivar']);
        Route::get('/venta/obtenerCabecera', [VentaController::class, 'obtenerCabecera']);
        Route::get('/venta/obtenerDetalles', [VentaController::class, 'obtenerDetalles']);
        Route::get('/venta/pdf/{id}',[VentaController::class, 'pdf'])->name('venta_pdf');

    });

    Route::group(['middleware' => ['Administrador']], function () {

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
        Route::get('/articulo/buscarArticulo', [ArticuloController::class, 'buscarArticulo']);
        Route::get('/articulo/listarArticulo', [ArticuloController::class, 'listarArticulo']);
        Route::get('/articulo/buscarArticuloVenta', [ArticuloController::class, 'buscarArticuloVenta']);
        Route::get('/articulo/listarArticuloVenta', [ArticuloController::class, 'listarArticuloVenta']);
        Route::get('/articulo/listarPdf',[ArticuloController::class, 'listarPdf'])->name('articulos_pdf');

        Route::get('/proveedor', [ProveedorController::class, 'index']);
        Route::post('/proveedor/registrar', [ProveedorController::class, 'store']);
        Route::put('/proveedor/actualizar', [ProveedorController::class, 'update']);
        Route::get('/proveedor/selectProveedor', [ProveedorController::class, 'selectProveedor']);

        Route::get('/ingreso', [IngresoController::class, 'index']);
        Route::post('/ingreso/registrar', [IngresoController::class, 'store']);
        Route::put('/ingreso/desactivar', [IngresoController::class, 'desactivar']);
        Route::get('/ingreso/obtenerCabecera', [IngresoController::class, 'obtenerCabecera']);
        Route::get('/ingreso/obtenerDetalles', [IngresoController::class, 'obtenerDetalles']);
        
        Route::get('/cliente', [ClienteController::class, 'index']);
        Route::post('/cliente/registrar', [ClienteController::class, 'store']);
        Route::put('/cliente/actualizar', [ClienteController::class, 'update']);
        Route::get('/cliente/selectCliente', [ClienteController::class, 'selectCliente']);

        Route::get('/venta', [VentaController::class, 'index']);
        Route::post('/venta/registrar', [VentaController::class, 'store']);
        Route::put('/venta/desactivar', [VentaController::class, 'desactivar']);
        Route::get('/venta/obtenerCabecera', [VentaController::class, 'obtenerCabecera']);
        Route::get('/venta/obtenerDetalles', [VentaController::class, 'obtenerDetalles']);
        Route::get('/venta/pdf/{id}',[VentaController::class, 'pdf'])->name('venta_pdf');
        
        Route::get('/rol', [RolController::class, 'index']);
        Route::get('/rol/selectRol', [RolController::class, 'selectRol']);
        
        Route::get('/user', [UserController::class, 'index']);
        Route::post('/user/registrar', [UserController::class, 'store']);
        Route::put('/user/actualizar', [UserController::class, 'update']);
        Route::put('/user/desactivar', [UserController::class, 'desactivar']);
        Route::put('/user/activar', [UserController::class, 'activar']);

    });
    
    //O también:
    //Route::get('/category', 'App\Http\Controllers\CategoryController@index');
    //Es para versiones anteriores pero funciona

});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
