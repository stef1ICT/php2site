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

Route::post('/admin-panel/products/store/', 'AdminProductController@store')->name('store-product');
Route::post('/admin-panel/products/{product}/add-specification', 'AdminProductController@addSpecification')->name('add-specification');
Route::post('/admin-panel/products/{product}', 'AdminProductController@update')->name('update-product');

Route::post('/search', 'ProductsController@search');
Route::post('/api/admin-panel/change-status', 'AdminOrderController@changeOrderStatus');
Route::get('/admin-panel/orders', 'AdminOrderController@index');
Route::get('/admin-panel/categories/create', 'AdminCategoryController@create')->name('create-category');

Route::get('/admin-panel/categories', 'AdminCategoryController@index');
Route::post('/admin-panel/categories', 'AdminCategoryController@store')->name('store-category');
Route::get('/admin-panel/categories/{category}', 'AdminCategoryController@show')->name('category');
Route::post('/api/admin-panel/deleteImage', 'AdminProductController@deleteImage');
Route::delete('/admin-panel/deleteSpecification', 'AdminProductController@deleteSpecification')->name('delete-specification');
Route::post('/admin-panel/products/{product}/addPhotos', 'AdminProductController@addPhotos')->name('add-photos');
Route::get('/admin-panel/create-product', 'AdminProductController@create')->name('create-product');
Route::get('/admin-panel/products', 'AdminProductController@index');
Route::get('/admin-panel', 'AdminUserController@index');
Route::get('/admin-panel/products/{product}', 'AdminProductController@show');
Route::get('/', 'HomeController@index');

Route::get('/my-orders', 'OrderController@userOrders');
Route::get('/register', 'UsersController@create');
Route::get('/login', 'UsersController@loginForm');
Route::post('/login', 'UsersController@login');
Route::post('/logout', 'UsersController@logout');
Route::post('/register', 'UsersController@store');
Route::get('/api/products/{categoryId}/{genderName}', 'HomeController@getProductsByCategoryIdAndProductGender');
Route::get('/{gender}/{category}/{product}', 'ProductsController@show');
Route::get('/shop', 'ProductsController@index');
Route::get('/products/{gender?}', 'ProductsController@index');
Route::post('/filterProducts', 'ProductsController@getFilterProducts');
Route::post('/api/addProduct', 'CartController@addProduct');
Route::post('/api/removeProduct', 'CartController@removeProduct');
Route::get('/shopping-cart', 'OrderController@shoppingCard');
Route::get('/checkout', 'OrderController@checkout');
Route::post('/api/updateQuantity', 'CartController@updateQuantity');
Route::post('/order', 'OrderController@store');
