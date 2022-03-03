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

// Route::group(['middleware'=>'web'],function(){
//     Auth::routes();
// });

Route::get('/produtos/create', [App\Http\Controllers\ProdutoController::class, 'create']);
Route::post('/produtos/add', [App\Http\Controllers\ProdutoController::class, 'add']);

//Route::group(['middleware'=>'auth'],function(){
    //Route::get('/', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produtos');
    
    // Route::get('/produtos/{produto}/edit', [App\Http\Controllers\ProdutoController::class, 'edit']);
    // Route::put('/produtos/update/{produto}', [App\Http\Controllers\ProdutoController::class, 'update'])->name('produtos.update');
    // Route::delete('/produtos/delete/{produto}', [App\Http\Controllers\ProdutoController::class, 'delete'])->name('produtos.destroy');

    // Route::get('/produtos/historico', [App\Http\Controllers\ProdutoController::class, 'historico'])->name('produtos.historico');

//});
