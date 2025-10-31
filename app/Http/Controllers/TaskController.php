<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Inertia\Inertia;
use Inertia\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Task\StoreTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()
            ->with('subTasks')
            ->get();

        return Inertia::render('Pages/Tasks/Index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tasks = Auth::user()->tasks()->get();
        return Inertia::render('Pages/Tasks/Create', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $user = Auth::user();

        $user->tasks()->create([
            'uuid' => Str::uuid(),
            ...$request->validated(),
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $task)
    {
        $tasks = Auth::user()->tasks()->where('id', '!=', $task->id)->get();
        
        return Inertia::render('Pages/Tasks/Edit', compact('task', 'tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
