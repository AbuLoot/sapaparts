<?php

Auth::routes();

Route::get('products', function() {

    $products = \App\Product::where('image', '!=', 'no-image-middle.png')->where('path', '=', '')->get();
    $i = 0;
    $s = 0;

    echo '<style>div {display: inline-block;}</style>';

    $files = Storage::allFiles('img/products');
    $pro_arr = $products->toArray();
    $box_arr = [];

    foreach ($pro_arr as $key => $value) {
        $box_arr[] = $value['image'];
    }

    // foreach ($products as $p => $product) {
    //     echo $p .' '.$product->image.'<br>';
    // }

    // echo '<pre>';
    // print_r($box_arr);
    // echo '</pre>';
    // dd();

    foreach ($files as $k => $file) {

        // list($a, $b, $c, $d, $e) = explode('/', $file);
        $f = explode('/', $file);
        $v = end($f);

        if (in_array($v, $box_arr)) {

            $product = \App\Product::where('image', $v)->first();            
            $product->path = $f[2].'/'.$f[3];
            $product->save();
        }
    }

    echo '<h4>'.$e.'</h4>';
});

Route::get('products2', function() {

    $products = \App\Product::where('image', '!=', 'no-image-middle.png')->where('path', '=', '')->get();
    $e = 0;

    echo '<style>div {display: inline-block;}</style>';

    foreach ($products as $product) {

        $images = unserialize($product->images);

        foreach ($images as $k => $image) {

            if (!file_exists('img/products/'.$product->path.'/'.$product->image)) {
                // echo '<div style="width:25%;height:150px;">';
                // echo '<img style="float:left; margin-right:5px;" src="/img/products/'.$product->path.'/'.$images[$k]['mini_image'].'">';
                // echo $product->title.'<br>';
                echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$product->category_id.'&nbsp;&nbsp;'.$product->path.'/'.$product->image.'<br>';
                // echo '&nbsp;&nbsp;&nbsp;&nbsp;'.$product->category_id.'&nbsp;&nbsp;'.$product->path.'/'.$images[$k]['mini_image'].'<br>';
                // echo '</div>';
                $e++;
            }
        }
    }

    echo '<h4>'.$e.'</h4>';
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
