<?php

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

Route::get('edit', 'StoreController@index');

Route::prefix('addresses')->as('address.')->group(function () {
    Route::get('edit/{id}', 'StoreController@edit')
        ->name('edit');
    Route::put('update/{id}', 'StoreController@update')
        ->name('update');

    Route::get('create', 'StoreController@create')
        ->name('create');
    Route::post('store', 'StoreController@store')
        ->name('store');
});