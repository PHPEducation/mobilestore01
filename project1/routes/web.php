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


Route::get('/{locale}', 'LocaleController@change_language')->name('set_locale');
Route::group(['prefix' => '/', 'middleware' => 'locale'], function() {
    Route::get('/', 'HomeController@index');
});
