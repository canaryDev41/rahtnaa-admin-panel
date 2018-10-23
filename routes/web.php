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

Route::get('/login', 'AdminController@login')->name('admin.login');
Route::post('/login', 'AdminController@submit')->name('admin.submit');
Route::get('/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function(){

    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::resource('/workers', 'WorkersController');

    Route::resource('/categories', 'CategoriesController');

});
