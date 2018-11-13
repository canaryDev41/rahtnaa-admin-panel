<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = Job::paginate(10);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('jobs.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Job::create($request->all());

        return redirect()->route('jobs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Job $job)
    {
        $categories = Category::all();

        return view('jobs.edit', ['job' => $job, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Job $job
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Job $job)
    {
        $job->update($request->all());

        return redirect()->route('jobs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Job $job)
    {
        $job->delete();

        if(\request()->expectsJson()){
            return response(['message' =>'deleted successfully'],202);
        }

        return back();
    }
}
