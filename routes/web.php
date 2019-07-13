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

Route::get('/','UserController@index');
Route::get('/service','UserController@services');
Route::get('/about','UserController@about');
Route::get('/contact','UserController@contact');

//posts
Route::resource('posts', 'PostsController');


