<?php

Auth::routes();

Route::get('products', function() {
    $products = \App\Product::all();
    $i = 0;
    foreach ($products as $product) {
        if (empty($product->path) && $product->image != 'no-image-middle.png') {
            echo ++$i . ' --- ' . $product->path.'/'.$product->image.'<br>';

            $images = unserialize($product->images);
            foreach ($images as $k => $image) {

                echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$product->path.'/'.$images[$k]['mini_image'].'<br>';

            }
        }
    }
});

    Route::get('products-images9', 'Joystick\ProductController@imagesFolder');

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
    Route::get('products-search', 'Joystick\ProductController@search');
    Route::get('products-category/{id}', 'Joystick\ProductController@categoryProducts');
    Route::get('products-actions', 'Joystick\ProductController@actionProducts');
    Route::get('products-price/edit', 'Joystick\ProductController@priceForm');
    Route::post('products-price/update', 'Joystick\ProductController@priceUpdate');

    Route::resource('roles', 'Joystick\RoleController');
    Route::resource('users', 'Joystick\UserController');
    Route::resource('permissions', 'Joystick\PermissionController');

    Route::get('apps', 'Joystick\AppController@index');
    Route::get('apps/{id}', 'Joystick\AppController@show');
    Route::delete('apps/{id}', 'Joystick\AppController@destroy');
});


// Input
Route::get('search', 'InputController@search');
Route::get('search-ajax', 'InputController@searchAjax');
Route::post('filter-products', 'InputController@filterProducts');
Route::post('send-app', 'InputController@sendApp');


// Basket Actions
Route::get('add-to-basket/{id}', 'BasketController@addToBasket');
Route::get('clear-basket', 'BasketController@clearBasket');
Route::get('basket', 'BasketController@basket');
Route::get('basket/{id}', 'BasketController@destroy');
Route::post('store-order', 'BasketController@storeOrder');


// Favorite Actions
Route::get('toggle-favorite/{id}', 'FavoriteController@toggleFavorite');


// Pages
Route::get('/', 'PageController@index');
Route::get('katalog-zapchastey', 'PageController@catalogs');
Route::get('catalog', 'PageController@catalog');
Route::get('catalog/{category}', 'PageController@categoryProducts');
Route::get('goods/{id}-{product}', 'PageController@product');
Route::get('catalog/brand/{company}', 'PageController@brandProducts');
Route::get('contacts', 'PageController@contacts');
Route::get('{page}', 'PageController@page');
