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
    return view('welcome');
});

Route::resource('/contacts' , 'ContactController');

Route::get('/user/create' , 'UserController@create')->name('user.create');
Route::post('/user/store' , 'UserController@store')->name('user.store');
Route::get('/user/{id}/edit' , 'UserController@edit')->name('user.edit');
Route::post('/user/{id}/update' , 'UserController@update')->name('user.update');
Route::get('/user' , 'UserController@index')->name('user.index');

Route::resource('/permissions','PermissionController');

Route::resource('/roles' ,'RoleController');

Route::resource('/repositories' , 'RepositoryController');



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
