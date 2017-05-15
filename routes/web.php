<?php

Auth::routes();

// Joystick Administration
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'Joystick\AdminController@index');

    Route::resource('categories', 'Joystick\CategoryController');
    Route::resource('countries', 'Joystick\CountryController');
    Route::resource('companies', 'Joystick\CompanyController');
    Route::resource('cities', 'Joystick\CityController');
    Route::resource('news', 'Joystick\NewController');
    Route::resource('languages', 'Joystick\LanguageController');
    Route::resource('options', 'Joystick\OptionController');
    Route::resource('orders', 'Joystick\OrderController');
    Route::resource('pages', 'Joystick\PageController');
    Route::resource('products', 'Joystick\ProductController');

    Route::resource('roles', 'Joystick\RoleController');
    Route::resource('users', 'Joystick\UserController');
    Route::resource('permissions', 'Joystick\PermissionController');

    Route::get('apps', 'Joystick\AppController@index');
    Route::get('apps/{id}', 'Joystick\AppController@show');
    Route::delete('apps/{id}', 'Joystick\AppController@destroy');
});


Route::get('search', 'InputController@search');

Route::get('search-ajax', 'InputController@searchAjax');

Route::get('cart/{id}', 'InputController@addToCart');

Route::get('clear-cart', 'InputController@clearCart');

Route::get('basket', 'InputController@basket');

Route::delete('basket/{id}', 'InputController@destroy');

Route::get('order', 'InputController@order');

Route::post('order', 'InputController@storeOrder');

// Pages
Route::get('/', 'MainController@index');

Route::get('catalog', 'MainController@catalog');

Route::get('catalog/{category}', 'MainController@categoryProducts');

Route::get('goods/{id}-{product}', 'MainController@product');

Route::get('catalog/brand/{company}', 'MainController@brandProducts');

Route::post('send-app', 'MainController@sendApp');

Route::get('contacts', 'MainController@contacts');

Route::get('{page}', 'MainController@page');
