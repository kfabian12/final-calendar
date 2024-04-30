<?php

namespace App\Http\Controllers;

use App\Models\Task;
 
use function Laravel\Prompts\alert;

class TasksController extends Controller
{ 
    public function create() 
    { 
        return view('toDo'); 
    } 

    public function store() 
    {
        $attributes = request()->validate([
            'task' => 'required|max:255',
            'due' => 'required',
            'published_at' => 'max:255'
        ]);

        Task::create($attributes);

        alert("Task Added!");

        return redirect('/toDo');
    }

    public function destroy(Task $task) {
        $task->delete();
        return back()->with('success', 'Task Deleted');
    }
}
