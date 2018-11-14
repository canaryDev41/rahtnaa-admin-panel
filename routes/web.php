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

    return redirect()->route('admin.login');

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
    Route::get('/workers/{worker_id}/activate', 'WorkersController@activate');
    Route::get('/workers/{worker_id}/inactivate', 'WorkersController@inactivate');

    //jobs routes
    Route::resource('/jobs', 'JobsController');

    //categories routes
    Route::resource('/categories', 'CategoriesController');
    Route::get('/categories/{category}/activate', 'CategoriesController@activate');
    Route::get('/categories/{category}/inactivate', 'CategoriesController@inactivate');

    //orders routes
    Route::resource('/orders', 'OrdersController');

    Route::get('cities', function (){
        $cities = \App\City::all();

        return view('cities.index')->with(['cities' => $cities]);
    });

});
