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


Auth::routes();
Route::group(['prefix' => 'admin', 'middleware' => 'manager', 'namespace' => 'Admin'], function() {
    // Route::get('/', 'HomeController@index')->name('home');
    Route::get('logout', 'UserController@logout')->name('logout');

    Route::get('add-mode-of-payments', 'PaymentController@create');
    Route::post('store-mode-of-payments', 'PaymentController@store')->name('create-mode-of-payment');
    Route::get('edit-mode-of-payments/{id}', 'PaymentController@edit')->name('edit-mode-of-payment');
    Route::post('update-mode-of-payments/{id}', 'PaymentController@update')->name('update-mode-of-payment');
    Route::get('delete-mode-of-payments/{id}', 'PaymentController@delete')->name('delete-mode-of-payments');
    Route::get('mode-of-payments', 'PaymentController@index')->name('mode-of-payments');
});

Route::get('/{locale}', 'LocaleController@change_language')->name('set_locale');
Route::group(['prefix' => '/', 'middleware' => 'locale'], function() {
   //code
	Route::get('/', 'HomeController@index');
});
