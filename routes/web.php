<?php

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


//get lista
Route::get('/produtos', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produtos.list');
Route::get('/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('clientes.list');
Route::get('/pedidos', [App\Http\Controllers\PedidoController::class, 'index'])->name('pedidos.list');

//get formulario cadastro
Route::get('/produtos/create', [App\Http\Controllers\ProdutoController::class, 'create'])->name('produtos.create');
Route::get('/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('clientes.create');
Route::get('/pedidos/create', [App\Http\Controllers\PedidoController::class, 'create'])->name('pedidos.create');

//get formulario cadastro
Route::get('/produtos/edit/{produto}', [App\Http\Controllers\ProdutoController::class, 'edit'])->name('produtos.edit');
Route::get('/clientes/edit/{cliente}', [App\Http\Controllers\ClienteController::class, 'edit'])->name('clientes.edit');
Route::get('/pedidos/edit/{pedido}', [App\Http\Controllers\PedidoController::class, 'edit'])->name('pedidos.edit');

//post
Route::post('/produtos/add', [App\Http\Controllers\ProdutoController::class, 'add'])->name('produtos.add');
Route::post('/clientes/add', [App\Http\Controllers\ClienteController::class, 'add'])->name('clientes.add');
Route::post('/pedidos/add', [App\Http\Controllers\PedidoController::class, 'add'])->name('pedidos.add');

//filtros de informações
Route::any('/produtos/filter', [App\Http\Controllers\ProdutoController::class, 'filter'])->name('produtos.filter');
Route::any('/clientes/filter', [App\Http\Controllers\ClienteController::class, 'filter'])->name('clientes.filter');
Route::any('/pedidos/filter', [App\Http\Controllers\PedidoController::class, 'filter'])->name('pedidos.filter');


//put
Route::put('/produtos/update/{produto}', [App\Http\Controllers\ProdutoController::class, 'update'])->name('produtos.update');
Route::put('/clientes/update/{cliente}', [App\Http\Controllers\ClienteController::class, 'update'])->name('clientes.update');
Route::put('/pedidos/update/{pedido}', [App\Http\Controllers\PedidoController::class, 'update'])->name('pedidos.update');

//delete
Route::delete('/produtos/delete/{produto}', [App\Http\Controllers\ProdutoController::class, 'destroy'])->name('produtos.destroy');
Route::delete('/clientes/delete/{cliente}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::delete('/pedidos/delete/{pedido}', [App\Http\Controllers\PedidoController::class, 'destroy'])->name('pedidos.destroy');
