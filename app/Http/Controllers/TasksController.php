<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::with('job')->paginate(10);

        return view('tasks.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jobs = Job::all();

        return view('tasks.create', ['jobs' => $jobs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());

        return redirect()->route('tasks.index');
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
     * @param Task $task
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Task $task)
    {
        $jobs = Job::all();

        return view('tasks.edit', ['task' => $task, 'jobs' => $jobs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Task $task
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Task $task)
    {

        $task->update($request->all());

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Task $task)
    {

        $task->forceDelete();

        if(\request()->expectsJson()){
            return response(['message' =>'deleted successfully'],202);
        }

        return back();
    }
}
