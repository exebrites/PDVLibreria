<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;

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
})->name('inicio');
Route::resource('producto', ProductoController::class);
// Route::resource('venta', VentaController::class);

// Route::resource('categoria', CategoriaController::class);
// Route::resources('proveedores', ProveedorController::class);

// Route::resour
Route::resource('proveedor', ProveedorController::class);
// Route::resource('categoria', CategoriaController::class)->except(['update']);
Route::put('categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');


Route::get('venta', [VentaController::class, 'index'])->name('venta.index');
Route::get('venta/create', [VentaController::class, 'create'])->name('venta.create');
Route::post('venta', [VentaController::class, 'store'])->name('venta.store');

Route::get('venta/{venta}/edit', [VentaController::class, 'edit'])->name('venta.edit');
Route::put('venta/{venta}', [VentaController::class, 'update'])->name('venta.update');
Route::delete('venta/{venta}', [VentaController::class, 'destroy'])->name('venta.destroy');
Route::get('venta/{venta}', [VentaController::class, 'show'])->name('venta.show');
Route::get('categoria', [CategoriaController::class, 'index'])->name('categoria.index');

Route::get('categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('categoria/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::put('categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
