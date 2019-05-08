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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', function(){
    return redirect('/dashboard');
});

Route::get('/dashboard', 'DashboardController@index');

Route::resource('/assets', 'AssetController');
Route::resource('/categories', 'CategoryController');
Route::resource('/modelnames', 'ModelnameController');
Route::resource('/requests', 'AssetUserController');
Route::resource('/transactions', 'TransactionController');

Route::middleware('is.admin')->group(function(){
	Route::get('/assets/create', 'AssetController@create');
	Route::get('/categories/create', 'CategoryController@create');
	Route::get('/users/create', 'UserController@create');
	Route::resource('/users', 'UserController');
});
