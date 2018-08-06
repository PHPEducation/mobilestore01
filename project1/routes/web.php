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
Route::group(['prefix' => 'admin', 'middleware' => ['manager', 'locale'], 'namespace' => 'Admin'], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('add-mode-of-payments', 'PaymentController@create')->name('add-mode-of-payment');;
    Route::post('store-mode-of-payments', 'PaymentController@store')->name('create-mode-of-payment');
    Route::get('edit-mode-of-payments/{id}', 'PaymentController@edit')->name('edit-mode-of-payment');
    Route::post('update-mode-of-payments/{id}', 'PaymentController@update')->name('update-mode-of-payment');
    Route::get('delete-mode-of-payments/{id}', 'PaymentController@delete')->name('delete-mode-of-payments');
    Route::get('mode-of-payments', 'PaymentController@index')->name('mode-of-payments');


    Route::get('add-catalogs', 'CatalogController@create')->name('add-catalogs');
    Route::post('store-catalogs', 'CatalogController@store')->name('create-catalogs');
    Route::get('edit-catalogs/{id}', 'CatalogController@edit')->name('edit-catalogs');
    Route::post('update-catalogs/{id}', 'CatalogController@update')->name('update-catalogs');
    Route::get('delete-catalogs/{id}', 'CatalogController@delete')->name('delete-catalogs');
    Route::get('catalogs', 'CatalogController@index')->name('catalogs');
    Route::get('{slug}/categories', 'CatalogController@categories')->name('categories_of_catalog');
    // categories
    Route::get('add-categories', 'CategoryController@create')->name('add-categories');
    Route::post('store-categories', 'CategoryController@store')->name('create-categories');
    Route::get('edit-categories/{id}', 'CategoryController@edit')->name('edit-categories');
    Route::post('update-categories/{id}', 'CategoryController@update')->name('update-categories');
    Route::get('delete-categories/{id}', 'CategoryController@delete')->name('delete-categories');
    Route::get('categories', 'CategoryController@index')->name('categories');

    //products
    Route::get('add-products', 'ProductController@create')->name('add-products');
    Route::post('store-products', 'ProductController@store')->name('store-products');
    Route::get('edit-products/{id}', 'ProductController@edit')->name('edit-products');
    Route::post('update-products/{id}', 'ProductController@update')->name('update-products');
    Route::get('delete-products/{id}', 'ProductController@delete')->name('delete-products');
    Route::get('products', 'ProductController@index')->name('products');


    Route::get('add-companies', 'CompanyController@create')->name('add-companies');
    Route::post('store-companies', 'CompanyController@store')->name('create-companies');
    Route::get('edit-companies/{id}', 'CompanyController@edit')->name('edit-companies');
    Route::post('update-companies/{id}', 'CompanyController@update')->name('update-companies');
    Route::get('delete-companies/{id}', 'CompanyController@delete')->name('delete-companies');
    Route::get('companies', 'CompanyController@index')->name('companies');

    Route::get('add-abouts', 'AboutController@create')->name('add-abouts');
    Route::post('store-abouts', 'AboutController@store')->name('create-abouts');
    Route::get('edit-abouts/{id}', 'AboutController@edit')->name('edit-abouts');
    Route::post('update-abouts/{id}', 'AboutController@update')->name('update-abouts');
    Route::get('delete-abouts/{id}', 'AboutController@delete')->name('delete-abouts');
    Route::get('abouts', 'AboutController@index')->name('abouts');

    //Route::resource('abouts', 'AboutController');


});

Route::get('/{locale}', 'LocaleController@change_language')->name('set_locale');
Route::group(['prefix' => '/', 'middleware' => 'locale'], function() {
});
