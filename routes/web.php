<?php

use Illuminate\Support\Facades\Route;
use App\Product;
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

Route::get('/', 'TestController@welcome');

Auth::routes();

Route::get('/search', 'SearchController@show');  
Route::get('/products/json', 'SearchController@data');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}', 'ProductController@show');
Route::get('/categories/{category}', 'CategoryController@show');

Route::post('/cart', 'CartDetailController@store');
Route::delete('/cart', 'CartDetailController@destroy');

Route::post('/order', 'CartController@update');


Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function(){
Route::get('/products', 'ProductController@index');//Listado
Route::get('/products/create', 'ProductController@create');//formulario
Route::post('/products', 'ProductController@store');//registrar
Route::get('/products/{id}/edit', 'ProductController@edit');//formulario de edicion
Route::post('/products/{id}/edit', 'ProductController@update');//Actualiza
Route::post('/products/{id}/delete', 'ProductController@destroy');//formulario eliminar

Route::get('/products/{id}/images', 'ImageController@index');//Lista imagenes de los productos
Route::post('/products/{id}/images', 'ImageController@store');//Registra la imagen del producto
Route::delete('/products/{id}/images', 'ImageController@destroy');//Elimina la imagen del producto
Route::get('/products/{id}/images/select/{image}', 'ImageController@select');//Destacar una imagen

//Gestion de categorias
Route::get('/categories', 'CategoryController@index');//Listado
Route::get('/categories/create', 'CategoryController@create');//formulario
Route::post('/categories', 'CategoryController@store');//registrar
Route::get('/categories/{category}/edit', 'CategoryController@edit');//formulario de edicion
Route::post('/categories/{category}/edit', 'CategoryController@update');//Actualiza
Route::post('/categories/{category}/delete', 'CategoryController@destroy');//formulario eliminar


});

/**
 * ADMIN:
 * kike123kob@gmail.com
 * k1k3k1k3$$$
 * USSER:
 * luis@hotmail.com
 * luisluis123
 */