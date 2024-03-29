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

Route::get('/','DashBoardController@index');
Route::get('/service','UserController@services');
Route::get('/about','UserController@about');
Route::get('/contact','UserController@contact');

//posts
Route::resource('posts', 'PostsController');
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::get('/dashboard','DashBoardController@index');
