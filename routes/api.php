<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//get all tasks using task-list
Route::get('task-list', [TaskController::class, 'getTaskList']);

//create task 
Route::post('create-task', [TaskController::class, 'createTask']);

//update task
Route::put('update-task', [TaskController::class, 'updateTask']);

//delete task
Route::delete('delete-task/{id}', [TaskController::class, 'deleteTask']);