<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/galeria', function () {
    return view('galeria');
});

Route::get('categoria', [CategoriaController::class, 'getCategorias'])
->name('getcategorias');

Route::post('create/categoria', [CategoriaController::class, 'createCategoria'])
->name('categoria.create');

Route::put("update/categoria/{id}", [CategoriaController::class,'updateCategoria'])
->name("categoria.update");

Route::delete("delete/categoria/{id}",[CategoriaController::class, 'deleteCategoria'])
->name("categoria.delete");

Route::get("/productos",[ProductoController::class, 'getProductos'])
->name("productos.get");

Route::post("productos/create",[ProductoController::class,'createProducto'])
->name("producto.create");

Route::put("productos/update/{id}",[ProductoController::class, 'updateProducto'])
->name("productos.update");

Route::delete("productos/delete/{id}",[ProductoController::class, 'deleteProducto'])
->name("productos.delete");
