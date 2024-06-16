<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TaskController extends Controller
{


    function getTaskList()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        
        return response()->json(['status' => 200, 'tasks' => $tasks]);
    }

    function createTask(Request $request){

        $task = request('task');

        Task::create([
            'title' => $task['title'],
            'description' => $task['description'],
            'status' => $task['status'],
        ]);



        return response()->json(['status' => 200, 'message' => 'Task created successfully']);

    }


    function updateTask(Request $request){

        $task = request('task');


        Task::where('id', $task['id'])->update([
            'title' => $task['title'],
            'description' => $task['description'],
            'status' => $task['status'],
        ]);


        return response()->json(['status' => 200, 'message' => 'Task updated successfully']);
    }

    function deleteTask(){

        $id = request('id');

        Task::where('id', $id)->delete();


        return response()->json(['status' => 200, 'message' => 'Task deleted successfully']);

    }
}
