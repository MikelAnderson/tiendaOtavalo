<?php

use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
Route::get('/products/search', 'App\Http\Controllers\ProductController@search')->name("product.search");
Route::get('/categories' , 'App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('/categories/{id}' , 'App\Http\Controllers\CategoryController@show')->name('category.show');
Route::get('/featured-products', '\App\Http\Controllers\ProductController@featured')->name('product.featured');
Route::get('/on-sale-products', '\App\Http\Controllers\ProductController@onSale')->name('product.sale');


Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::get('/cart/delete/{id}', 'App\Http\Controllers\CartController@deleteItem')->name("cart.delete-item");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
    
    Route::get('/admin/categories', '\App\Http\Controllers\Admin\AdminCategoryController@index')->name("admin.categories.index");
    Route::post('/admin/categories/store', '\App\Http\Controllers\Admin\AdminCategoryController@store')->name("admin.categories.store");
    Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name("admin.categories.delete");
    Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name("admin.categories.edit");
    Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name("admin.categories.update");


});

Route::post('/productos/show' , '\App\Http\Controllers\CommentsController@newComment')->name('product.comment');

Auth::routes();
