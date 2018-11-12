<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\WorkersRequest;
use App\Worker;
use foo\bar;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class WorkersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::with(['city'])->paginate(10);

        return view('workers.index', ['workers' => $workers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();

        return view('workers.create', ['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "image" => 'mimes:jpeg,jpg,png',
            "name" => 'required|min:2',
            "city_id" => 'required|integer',
            "phone" => 'required|regex:/(0)[0-9]{9}/|unique:workers',
            "national_id_image" => 'required|mimes:jpeg,jpg,png',
            "status" => 'required',
        ]);

        $imagePath = $request->file('image')->store('workersImages') ?: null;

        $nationalIdPath = $request->file('national_id_image')->store('nationalsIDS');

        $worker = new Worker();

        $worker->image = $imagePath;
        $worker->name = $request->get('name');
        //$worker->password = bcrypt($request->get('password'));
        $worker->city_id = $request->get('city_id');
        $worker->phone = $request->get('phone');
        $worker->national_id_image = $nationalIdPath;
        $worker->status = $request->get('status');

        $worker->save();

        return redirect()->route('workers.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Worker $worker)
    {
        $cities = City::all();

        return view('workers.show', ['worker' => $worker, 'cities' => $cities]);
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

        if(\request()->expectsJson()){
            return response(['message' =>'deleted successfully'],202);
        }

        return back();
    }

    public function activate($worker_id){
        $worker = Worker::where('id', $worker_id)->first();

        $worker->update([
            'status' => true
        ]);

        if(\request()->expectsJson()){
            return response(['message' =>$worker],202);
        }

        return back();
    }

    public function inactivate($worker_id){

        $worker = Worker::where('id', $worker_id)->first();

        $worker->update([
            'status' => false
        ]);

        if(\request()->expectsJson()){
            return response(['message' =>'updated successfully'],202);
        }

        return back();
    }
}
