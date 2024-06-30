<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth.api');
    // }

    // public function addTask(Request $request)
    // {
    //     $request->validate([
    //         'task' => 'required|string',
    //         'user_id' => 'required|exists:users,id',
    //     ]);

    //     $task = Task::create([
    //         'user_id' => $request->user_id,
    //         'task' => $request->task,
    //         'status' => 'pending',
    //     ]);

    //     return response()->json([
    //         'task' => $task,
    //         'status' => 1,
    //         'message' => 'Successfully created a task',
    //     ]);
    // }

    // public function changeStatus(Request $request)
    // {
    //     $request->validate([
    //         'task_id' => 'required|exists:tasks,id',
    //         'status' => 'required|in:pending,done',
    //     ]);

    //     $task = Task::find($request->task_id);
    //     $task->status = $request->status;
    //     $task->save();

    //     $message = $request->status == 'done' ? 'Marked task as done' : 'Marked task as pending';

    //     return response()->json([
    //         'task' => $task,
    //         'status' => 1,
    //         'message' => $message,
    //     ]);
    // }
    
    // public function __construct()
    // {
    //     $this->middleware('auth.api');
    // }

    public function addTask(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'task' => 'required|string|max:255',
        ]);

        $task = Task::create([
            'user_id' => $request->user_id,
            'task' => $request->task,
        ]);

        return response()->json([
            'task' => $task,
            'status' => 1,
            'message' => 'Successfully created a task',
        ]);
    }

    public function updateTaskStatus(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'status' => 'required|in:pending,done',
        ]);

        $task = Task::find($request->task_id);
        $task->status = $request->status;
        $task->save();

        $message = $task->status == 'done' ? 'Marked task as done' : 'Marked task as pending';

        return response()->json([
            'task' => $task,
            'status' => 1,
            'message' => $message,
        ]);
    }
}
