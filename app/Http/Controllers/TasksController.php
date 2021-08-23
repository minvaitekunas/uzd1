<?php

namespace App\Http\Controllers;

use App\Models\tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->status_id) && $request->status_id !== 0)
        $tasks = \App\Models\tasks::where('status_id', $request->status_id)->orderBy('created_at')->get();
    else
        $tasks = \App\Models\tasks::orderBy('created_at')->get();
    $statuses = \App\Models\status::orderBy('name')->get();
    return view('tasks.index', ['tasks' => $tasks, 'statuses' => $statuses]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = \App\Models\status::orderBy('name')->get();
        return view('tasks.create', ['statuses' => $statuses]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new tasks();
        // can be used for seeing the insides of the incoming request
        // dd($request->all());;
        $task->fill($request->all());
        $task->save();
        return redirect()->route('tasks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(tasks $tasks)
    {
        $statuses = \App\Models\tasks::orderBy('created_at')->get();
        return view('tasks.edit', ['tasks' => $tasks, 'statuses' => $statuses]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tasks $task)
    {
        $task->fill($request->all());
        $task->save();
        return redirect()->route('tasks.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(tasks $tasks, Request $request)
    {
        $tasks->delete();
        return redirect()->route('tasks.index', ['status_id'=> $request->input('status_id')]);
    }
}
