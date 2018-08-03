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
Route::get('logout', 'UserController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'middleware' => 'manager', 'namespace' => 'Admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::get('add-mode-of-payments', 'PaymentController@create')->name('add-mode-of-payment');
    Route::post('store-mode-of-payments', 'PaymentController@store')->name('create-mode-of-payment');
    Route::get('edit-mode-of-payments/{id}', 'PaymentController@edit')->name('edit-mode-of-payment');
    Route::post('update-mode-of-payments/{id}', 'PaymentController@update')->name('update-mode-of-payment');
    Route::get('delete-mode-of-payments/{id}', 'PaymentController@delete')->name('delete-mode-of-payments');
    Route::get('mode-of-payments', 'PaymentController@index')->name('mode-of-payments');

    Route::get('add-categories', 'CategoryController@create')->name('add-categories');
    Route::post('store-categories', 'CategoryController@store')->name('create-categories');
    Route::get('edit-categories/{id}', 'CategoryController@edit')->name('edit-categories');
    Route::post('update-categories/{id}', 'CategoryController@update')->name('update-categories');
    Route::get('delete-categories/{id}', 'CategoryController@delete')->name('delete-categories');
    Route::get('categories', 'CategoryController@index')->name('categories');
});

Route::get('/{locale}', 'LocaleController@change_language')->name('set_locale');
Route::group(['prefix' => '/', 'middleware' => 'locale'], function() {
});
