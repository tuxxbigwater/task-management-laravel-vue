<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return response()->json([
        'tasks' => Task::all()
      ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'title' => 'required|string|max:255'
      ]);

      $task = Task::create($request->only('title'));
      return response()->json([
        'task' => $task
      ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
      $request->validate([
        'completed' => 'required|boolean',
      ]);

      $task->completed = $request->completed;
      $task->save();

      return response()->json([
        'task' => $task
      ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
      $task->delete();
      return response()->json(null, 204);
    }
}
