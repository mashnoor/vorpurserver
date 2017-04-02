<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
	return "Hello Mash";
});

Route::get('/api/product/{id}', 'ProductController@getProduct');

Route::get('/api/product/image/{filename}', 'ProductController@getProductImage');

Route::get('/api/brands/', 'BrandController@getAllBrands');

Route::get('/api/brand/image/{name}', 'ImageController@getBrandImage');

Route::get('api/product/{productid}/islikedby/{userid}', 'ProductController@isLiked');

Route::get('api/product/{productid}/like/{userid}', 'ProductController@like');

Route::get('/api/catagories/', 'CatagoryController@getAllCatagory');

Route::get('/api/catagory/image/{name}', 'ImageController@getCatagoryImage');

//Product Routes
Route::get('/api/products/getlatestthreeproducts', 'ProductController@get_latest_three');