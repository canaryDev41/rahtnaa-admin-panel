<?php

use Illuminate\Support\Facades\Redis;

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
Route::get('/socket', function (){
    // 1. Publish event with Redis
    $data = [
        'event' => 'OrderCreated',
        'data' => [
            'total' => '125$'
        ]
    ];

    Redis::publish('orders-channel', json_encode($data));

    return view('socket');

    // 3. Use socket.io to emit to all clients.
});

Route::get('/', function (){
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

    //users routes
    Route::resource('/users', 'UsersController');
    Route::get('/users/{user_id}/activate', 'UsersController@activate');
    Route::get('/users/{user_id}/inactivate', 'UsersController@inactivate');

    //jobs routes
    Route::resource('/jobs', 'JobsController');

    //tasks routes
    Route::resource('/tasks', 'TasksController');

    //categories routes
    Route::resource('/categories', 'CategoriesController');
    Route::get('/categories/{category}/activate', 'CategoriesController@activate');
    Route::get('/categories/{category}/inactivate', 'CategoriesController@inactivate');

    //orders routes
    Route::resource('/orders', 'OrdersController');
    Route::get('/orders/{order}/cancel', 'OrdersController@cancelOrder')->name('orders.cancel');
    Route::post('/orders/{order}/associate', 'OrdersController@associate')->name('orders.associate');

    Route::get('cities', function (){
        $cities = \App\City::all();

        return view('cities.index')->with(['cities' => $cities]);
    })->name('cities.index');

});
