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

Route::redirect('/', '/users/list');

Route::get('/users/list', 'UserController@list');
Route::get('/users/create', 'UserController@create');
Route::post('/users/create', 'UserController@store');
Route::get('/users/update/{id}', 'UserController@edit');
Route::post('/users/update/{id}', 'UserController@update');
Route::get('/users/delete/{id}', 'UserController@delete');
Route::get('/users/{id}', 'UserController@show');
