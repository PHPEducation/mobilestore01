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
    Route::get('{slug}/products', 'CategoryController@products')->name('products_of_category');


    //products
    Route::get('add-products', 'ProductController@create')->name('add-products');
    Route::post('store-products', 'ProductController@store')->name('store-products');
    Route::get('edit-products/{id}', 'ProductController@edit')->name('edit-products');
    Route::post('update-products/{id}', 'ProductController@update')->name('update-products');
    Route::get('delete-products/{id}', 'ProductController@delete')->name('delete-products');
    Route::get('products', 'ProductController@index')->name('products');
    Route::post('publish/product', 'ProductController@publish')->name('publish');
    Route::get('products/show/{slug}', 'ProductController@show')->name('show_product');
    //users
    Route::get('add-users', 'UserController@create')->middleware('register')->name('admin-add-users');
    Route::post('store-users', 'UserController@store')->middleware('register')->name('admin-store-users');
    Route::get('edit-users/{id}', 'UserController@edit')->name('admin-edit-users');
    Route::post('update-users/{id}', 'UserController@update')->name('admin-update-users');
    Route::get('users', 'UserController@index')->name('admin-users');
    Route::post('publish/user', 'UserController@publish')->name('publish');
    Route::get('users-of-roles/{id}', 'UserController@usersOfRoles')->name('users-of-roles');


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

    //slide
    Route::get('add-slides', 'SlideController@create')->name('add-slides');
    Route::post('store-slides', 'SlideController@store')->name('create-slides');
    Route::get('delete-slides/{id}', 'SlideController@delete')->name('delete-slides');
    Route::get('slides', 'SlideController@index')->name('slides');


    //Route::resource('abouts', 'AboutController');



    Route::get('add-news', 'NewsController@create')->name('add-news');
    Route::post('store-news', 'NewsController@store')->name('store-news');
    Route::get('edit-news/{id}', 'NewsController@edit')->name('edit-news');
    Route::post('update-news/{id}', 'NewsController@update')->name('update-news');
    Route::get('delete-news/{id}', 'NewsController@delete')->name('delete-news');
    Route::get('news', 'NewsController@index')->name('news');


    Route::get('add-sales', 'SaleController@create')->name('add-sales');
    Route::post('store-sales', 'SaleController@store')->name('store-sales');
    Route::get('edit-sales/{id}', 'SaleController@edit')->name('edit-sales');
    Route::post('update-sales/{id}', 'SaleController@update')->name('update-sales');
    Route::get('delete-sales/{id}', 'SaleController@delete')->name('delete-sales');
    Route::get('sales', 'SaleController@index')->name('sales');


});

Route::group(['prefix' => '/', 'middleware' => 'locale'], function() {
    Route::get('/', 'HomeController@index')->name('home-user');
    Route::get('register', 'UserController@formRegister')->name('register');
    Route::post('register', 'UserController@register')->name('user-register');
    Route::get('users-profile/{id}', 'UserController@show')->name('user-show-profile');
    Route::post('user-profile/{id}', 'UserController@update')->name('user-update-profile');
    Route::get('user-show-product/{slug}', 'ProductController@show')->name('user-show-product');
    Route::post('user-review', 'ReviewController@store')->name('user-review');
    //cart
    Route::get('add-to-cart/{id}', 'CartController@add')->name('add-to-cart');
    Route::get('all-cart', 'CartController@index')->name('all-cart');
    Route::get('cart-delete/{id}', 'CartController@delete')->name('delete-product-in-cart');
    Route::get('cart-update/{id}', 'CartController@update')->name('cart-update');
    Route::get('enter-info', 'OrderDetailController@enterInfo')->name('enter-info');
    Route::post('enter-info', 'OrderDetailController@order')->name('order');
});

Route::group(['prefix' => 'setLocale'], function() {
    Route::get('/{locale}', 'LocaleController@change_language')->name('set_locale');
});
