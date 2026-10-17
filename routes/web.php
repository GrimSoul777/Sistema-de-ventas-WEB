<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/galeria', function () {
    return view('galeria');
});

//Categorias
Route::get('categoria', [CategoriaController::class, 'getCategorias'])
->name('getcategorias');

Route::post('create/categoria', [CategoriaController::class, 'createCategoria'])
->name('categoria.create');

Route::put("update/categoria/{id}", [CategoriaController::class,'updateCategoria'])
->name("categoria.update");

Route::delete("delete/categoria/{id}",[CategoriaController::class, 'deleteCategoria'])
->name("categoria.delete");

//Productos
Route::get("/productos",[ProductoController::class, 'getProductos'])
->name("productos.get");

Route::post("productos/create",[ProductoController::class,'createProducto'])
->name("producto.create");

Route::put("productos/update/{id}",[ProductoController::class, 'updateProducto'])
->name("productos.update");

Route::delete("productos/delete/{id}",[ProductoController::class, 'deleteProducto'])
->name("productos.delete");

//Clientes
Route::get("/clientes",[ClienteController::class, 'getClientes'])
->name("clientes.get");

Route::post("clientes/create",[ClienteController::class,'createCliente'])
->name("clientes.create");

Route::put("clientes/update/{id}",[ClienteController::class, 'updateCliente'])
->name("clientes.update");

Route::delete("clientes/delete/{id}",[ClienteController::class, 'deleteCliente'])
->name("clientes.delete");