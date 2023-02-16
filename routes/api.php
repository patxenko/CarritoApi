<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Estas son las rutas de la API de uso interno del proyecto.
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function(){

    // Ruta para redirigir a la vista del carrito
    Route::get('/cart-checkout','CartController@cart')->name('cart.checkout');

    // Ruta para añadir producto al carrito
    Route::post('/cart-add','CartController@add')->name('cart.add');

    // Ruta para actualizar un producto del carrito
    Route::patch('/update-cart', 'CartController@update')->name('update.cart');

    // Ruta para eliminar un producto del carrito
    Route::delete('/remove-from-cart', 'CartController@remove')->name('remove.from.cart');

    // Ruta para eliminar por completo el carrito
    Route::post('/cart-clear',  'CartController@clear')->name('cart.clear');

});