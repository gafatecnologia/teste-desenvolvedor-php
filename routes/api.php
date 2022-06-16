<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;

Route::post('/login', [JWTController::class, 'login']);

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);
});

Route::resource('products', 'App\Http\Controllers\ProductController');
Route::post('product-edit/{id}', 'App\Http\Controllers\ProductController@update');

Route::resource('clients', 'App\Http\Controllers\ClientController');
Route::post('client-edit/{id}', 'App\Http\Controllers\ClientController@update');

Route::resource('requests', 'App\Http\Controllers\RequestController');
Route::post('request-edit/{id}', 'App\Http\Controllers\RequestController@update');