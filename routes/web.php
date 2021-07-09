<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturaProductosController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Auth\Events\Login;
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
// Rutas Inicales Login
Route::get('/', [LoginController::class , 'login'])->name('login.index');
Route::post('/dashboard', [ LoginController::class , 'validar' ])->name('login.validar');
Route::get('/dashboard',[LoginController::class , 'home'])->name('login.dashboard');

// Rutas Usuarios
Route::get('/usuarios', [UsuariosController::class , 'index'])->name('usuarios.index');

//Rutas Clientes
Route::get('/clientes', [ClientesController::class , 'index'])->name('clientes.index');
Route::get('/create-cliente', [ClientesController::class , 'create'])->name('clientes.create');
Route::post('/create-cliente', [ClientesController::class , 'store'])->name('clientes.store');
Route::get('/cliente/edit/{id}', [ClientesController::class , 'edit'])->name('clientes.edit');
Route::put('/cliente/update/{clientes}', [ClientesController::class , 'update'])->name('clientes.update');
Route::delete('/cliente/delete/{clientes}', [ClientesController::class , 'destroy'])->name('clientes.delete');
Route::get('/cliente/data', [FacturaProductosController::class , 'datosClientes'])->name('facturasProductos.datosClientes');

// Rutas Productos
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
Route::get('/search/productos', [FacturaProductosController::class , 'index'])->name('facturasProductos.index');
Route::get('/producto/data', [FacturaProductosController::class , 'data'])->name('facturasProductos.data');

// Rutas Facturas 
Route::get('/facturas', [ FacturasController::class , 'index'])->name('facturas.index');
Route::get('/create-factura',[ FacturasController::class , 'create'])->name('facturas.create');
Route::post('/create-factura', [FacturasController::class , 'store'])->name('facturas.store');