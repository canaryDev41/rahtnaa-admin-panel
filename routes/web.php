<?php

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;

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

Route::group(['prefix' => 'dashboard', 'middleware' => 'admin'], function () {

    //dashboard routes
    Route::get('/', 'DashboardController@index')->name('dashboard.index');

    //workers routes
    Route::resource('/workers', 'WorkersController');
    Route::get('/workers/{worker_id}/activate', 'WorkersController@activate');
    Route::get('/workers/{worker_id}/inactivate', 'WorkersController@inactivate');
    Route::post('/workers/{worker}/upload', function (\App\Worker $worker) {

        $imageName = $worker->id.'_nationalID'.time().'.'.request()->national_id_image->getClientOriginalExtension();

        request()->national_id_image->storeAs('nationalID',$imageName);

        $worker->national_id_image = $imageName;
        $worker->update();

       return $worker;

    })->name('workers.upload');

    Route::post('/workers/{worker}/associateJob', function (\Illuminate\Http\Request $request, \App\Worker $worker) {

        if ($request->jobs) {
            foreach ($request->jobs as $job) {
                $worker->jobs()->attach($job);
            }
        }

        return back();

    })->name('workers.associateJob');

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
    Route::get('/category_changed/{category_id}', function ($category_id) {
        $jobs = \App\Job::where('category_id', $category_id)->get();
        return $jobs;
    });

    //orders routes
    Route::resource('/orders', 'OrdersController');
    Route::get('/orders/{order}/toggleStatus/{status}', 'OrdersController@orderStatus')->name('orders.status');
    Route::get('/orders/{order}/associate', 'OrdersController@prepareAssociate')->name('orders.prepareAssociate');
    Route::post('/orders/{order}/associate', 'OrdersController@associate')->name('orders.associate');
    Route::get('/orders/{order}/dissociateWorker', 'OrdersController@dissociateWorker')->name('orders.dissociateWorker');

    Route::get('cities', function () {
        $cities = \App\City::all();

        return view('cities.index')->with(['cities' => $cities]);
    })->name('cities.index');

    Route::get('city_changed/{city_id}', function ($cityID) {

        if ($cityID != 0) {
            session(['city_id' => $cityID]);
        }
        return;

    })->name('city.changed');

    Route::get('job_changed/{job_id}', function ($jobID) {

        if (!session('city_id') && $jobID == 0) {

            $workers = \App\Worker::all();

        } elseif (session('city_id') && $jobID != 0) {

            $workers = \App\Worker::where('city_id', session()->get('city_id'))->whereHas('jobs', function ($query) use ($jobID) {
                $query->where('job_id', $jobID);
            })->get();

        } elseif ($jobID != 0) {
            $workers = \App\Worker::whereHas('jobs', function ($query) use ($jobID) {
                $query->where('job_id', $jobID);
            })->get();
        } else {
            $workers = \App\Worker::where('city_id', session()->get('city_id'))->get();
        }

        return $workers;

    });

});
