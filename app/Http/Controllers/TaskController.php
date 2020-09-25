<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Http\Requests\UpdateTask;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->orderBy('deadline')->paginate(6);
        return view('tasks.main', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\StoreTask $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        try {
            $validated = $request->validated();
            $taskInfo = Arr::add($validated, 'user_id', auth()->id());
            Task::create($taskInfo);
            return redirect()->route('tasks.index');
        } catch (Exception $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Task $task)
    {
        if ($request->user()->can('view', $task)) {
            dd('show');
        } else {
            abort(401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Task $task)
    {
        if ($request->user()->can('update', $task)) {
            return view('tasks.edit', compact('task'));
        } else {
            abort(401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateTask  $request
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTask $request, Task $task)
    {
        if ($request->user()->can('update', $task)) {
            $task->update($request->validated());
            return redirect()->route('tasks.index');
        } else {
            abort(401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Task $task)
    {
        $user = $request->user();
        if ($user->can('delete', $task)) {
            $task->delete();
            if ($user->tasks->count()) {
                $celebrate = false;
            } else {
                $celebrate = true;
            }
            return redirect()->route('tasks.index')->with('celebrate', $celebrate);
        } else {
            abort(401);
        }
    }

    /**
     *  Show the form for destroying the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Task $task)
    {
        if ($request->user()->can('delete', $task)) {
            return view('tasks.delete', compact('task'));
        } else {
            abort(401);
        }
    }
}
