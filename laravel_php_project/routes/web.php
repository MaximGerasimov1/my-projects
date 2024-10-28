<?php

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

// Обработчик url адреса для главной страницы
Route::get('/', 'StaticController@index');

// Обработчик url адреса для секции blog
Route::get('/about-us', 'StaticController@about');
Route::get('/blog', 'StaticController@blog');

// Обработчик url адреса для секции shop
Route::get('/public/shop', 'ProductsController@create');
Route::get('/public/shop', 'ProductsController@index');
Route::get('public/shop/{id}', 'ProductsController@show');

// Обработчик url адреса для секции с созданием статей
Route::get('/article/add', 'ArticlesController@create');
Route::post('/article/add', 'ArticlesController@store');

// Обработчик url адреса редактирования статей
Route::get('/article/{id}/edit', 'ArticlesController@edit');
Route::put('/article/{id}/edit', 'ArticlesController@update');

// Обработчик url адреса для удаления и отображения(по отдельности) статей
Route::get('/article/{id}', 'ArticlesController@show');
Route::delete('/article/{id}/delete', 'ArticlesController@destroy');


// Route::resource('/articles', 'ArticlesController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
