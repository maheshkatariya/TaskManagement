<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|unique:tasks',
            ]);
    
            $task = Task::create(['title' => $request->title]);
    
            if(!$task) {
                return response()->json(['success' => false]);
            }
    
            return response()->json(['success' => true, 'task' => $task]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Task already exists OR Failed to create task.']);
        }
    }

    public function update(Task $task)
    {
        try {
            $task->completed = !$task->completed;
            $task->save();

            return response()->json(['success' => true, 'task' => $task]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update task.']);
        }
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['success' => true]);
    }

    public function showTask($completed)
    {
        if($completed  == 'all') {
            $tasks = Task::orderBy('created_at', 'desc')->get();
            return response()->json(['success' => true, 'tasks' => $tasks]);
        }

        $completed = filter_var($completed, FILTER_VALIDATE_BOOLEAN);
        $tasks = Task::orderBy('created_at', 'desc')->where('completed', $completed)->get();

        return response()->json(['success' => true, 'tasks' => $tasks]);
    }


}

