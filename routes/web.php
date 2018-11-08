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

//    $config['center'] = 'Sudan';
//    $config['zoom'] = '18';
//    $config['map_height'] = '600px';
//
//    GMaps::initialize($config);
//
//    $map = GMaps::create_map();

    return view('welcome');

});

//auth routes
Route::get('/login', 'AdminController@login')->name('admin.login');
Route::post('/login', 'AdminController@submit')->name('admin.submit');
Route::get('/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function(){

    //dashboard routes
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    //workers routes
    Route::resource('/workers', 'WorkersController');

    //jobs routes
    Route::resource('/jobs', 'JobsController');

    //categories routes
    Route::resource('/categories', 'CategoriesController');

    //orders routes
    Route::resource('/orders', 'OrdersController');

});
