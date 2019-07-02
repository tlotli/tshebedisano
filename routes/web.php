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
Route::get('/user/reset_user_password/{id}' , 'UserController@reset_user_password')->name('reset_user_password');
Route::post('/user/update_user_password/{id}' , 'UserController@update_user_password')->name('update_user_password');

Route::resource('/permissions','PermissionController');
Route::resource('/roles' ,'RoleController');

Route::resource('/repositories' , 'RepositoryController');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/repository_files/{id}' , 'FilesController@repository_files')->name('repository_files');
Route::get('/repository_upload/{id}' , 'FilesController@repository_upload')->name('repository_upload');
Route::post('/repository_post/{id}' , 'FilesController@repository_post')->name('repository_post');


Route::post('search_files/{id}' , 'FilesController@search_files')->name('search_files');
Route::post('remove_file/{id}'  , 'FilesController@remove_file')->name('remove_file');
Route::get('deleted_files'  , 'FilesController@deleted_files')->name('deleted_files');
Route::post('restore_files/{id}' , 'FilesController@restore_files')->name('restore_files');

Route::get('logs' , 'LogController@logs')->name('logs');