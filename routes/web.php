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

Route::get('/', function () {
    return view('describe/welcome');
});

Route::get('/users', 'UsersController@index');
Route::post('/users/login', 'UsersController@login');
Route::get('users/register','UsersController@register');
Route::post('users/register','UsersController@register');
Route::get('show/index','ShowController@index');