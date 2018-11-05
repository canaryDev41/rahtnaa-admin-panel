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

    $config['center'] = 'Manshia Bridge, Sudan';
    $config['zoom'] = '18';
    $config['map_height'] = '500px';

    GMaps::initialize($config);

    $map = GMaps::create_map();

    return view('welcome')->with(['map', $map]);

});

Route::get('/login', 'AdminController@login')->name('admin.login');
Route::post('/login', 'AdminController@submit')->name('admin.submit');
Route::get('/logout', 'AdminController@logout')->name('admin.logout');

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function(){

    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    Route::resource('/workers', 'WorkersController');

    Route::resource('/jobs', 'JobsController');

    Route::resource('/categories', 'CategoriesController');

    Route::resource('/orders', 'OrdersController');

});
