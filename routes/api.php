<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('order', function (Request $request) {

        $order = new \App\Order();

        $order->worker_id = $request->worker_id;
        $order->user_id = $request->user_id;
        $order->job_id = $request->job_id;
        $order->total = $request->total;
        $order->start_date = $request->start_date;
        $order->end_date = $request->end_date;
        $order->tasks = $request->tasks;
        $order->lat = $request->lat;
        $order->lng = $request->lng;
        $order->status = $request->status;

        return $order->save() ? response()->json(['status' => '201']) : response()->json(['message' => '500']);

});

Route::get('getUsers/{city_id}', function ($cityID) {

    $users = \App\User::where('city_id', $cityID)->get(['id', 'name', 'phone']);

    $users->each(function ($user){
        unset($user->orders);
        unset($user->city);
    });

    return $users;

});

Route::get('getWorkers/{city_id}', function ($cityID) {

    $workers = \App\Worker::where('city_id', $cityID)->get(['id', 'name', 'phone']);

    $workers->each(function ($worker){
        unset($worker->orders);
        unset($worker->city);
    });

    return $workers;

});

Route::get('getTasks/{jobID}', function ($jobID) {

    $tasks = \App\Task::where('job_id', $jobID)->get()->each(function ($task) use ($jobID) {
        $task->quantity = 0;
        $task->job = \App\Job::find($jobID)->get(['name'])[0]->name;
    });

    return response()->json($tasks);
});
