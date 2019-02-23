<?php

namespace App\Http\Controllers;

use App\City;
use App\Job;
use App\Worker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $workers = Worker::orderBy('id', 'DESC')->paginate(10);

        if ($request->orders) {
            switch ($request->orders) {
                case 'max':
                    $workers = Worker::withCount('orders')->orderBy('orders_count', 'DESC')->paginate(10);
                    break;

                case 'min':
                    $workers = Worker::withCount('orders')->orderBy('orders_count', 'ASC')->paginate(10);
                    break;
            }
        }

        $jobs = Job::all();
        $cities = City::all();

        if ($request->has('search'))
            $workers = Worker::search($request);

        return view('workers.index', compact('workers', 'jobs', 'cities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        $jobs = Job::all();

        return view('workers.create', [
            'cities' => $cities,
            'jobs' => $jobs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @internal param static $test
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required|min:2',
            "city_id" => 'required|integer',
            "phone" => 'required|unique:workers',
            "status" => 'required',
        ]);

        $worker = new Worker();
        $worker->name = $request->name;
        $worker->city()->associate($request->city_id);
        $worker->phone = $request->phone;
        $worker->status = (bool)$request->status;
        $worker->national_id_image = '';

        $worker->save();

        foreach ($request->jobs as $job) {

            $worker->jobs()->attach($job);

        }

        return redirect()->route('workers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param Worker $worker
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Worker $worker)
    {
        $cities = City::all();

        $galleries = $worker->galleries;

        $jobs = Job::all();

        return view('workers.show', ['worker' => $worker, 'cities' => $cities, 'galleries' => $galleries, 'jobs' => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $worker = Worker::find($id);

        return view('workers.edit', ['worker' => $worker]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Worker $worker
     * @param Request $request
     * @return \Illuminate\Http\Response
     * @internal param Request $request
     * @internal param int $id
     */
    public function update(Worker $worker, Request $request)
    {

        $this->validate($request, [
            "name" => 'required|min:2',
            "city_id" => 'required|integer',
            "phone" => 'required',
        ]);

        $worker->update([
            'name' => $request->name,
            'city_id' => $request->city_id,
            'phone' => $request->phone
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Worker $worker
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Worker $worker)
    {
        $worker->delete();

        if (\request()->expectsJson()) {
            return response(['message' => 'deleted successfully'], 202);
        }

        return back();
    }

    public function activate($worker_id)
    {
        $worker = Worker::where('id', $worker_id)->first();

        $worker->update([
            'status' => true,
            'work_status' => 'online'
        ]);

        if (\request()->expectsJson()) {
            return response(['message' => $worker], 202);
        }

        return back();
    }

    public function inactivate($worker_id)
    {

        $worker = Worker::where('id', $worker_id)->first();

        $worker->update([
            'status' => false,
            'work_status' => 'offline'
        ]);

        if (\request()->expectsJson()) {
            return response(['message' => 'updated successfully'], 202);
        }

        return back();
    }
}
