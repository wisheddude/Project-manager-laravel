<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {

    Route::get('/', [ProjectController::class, 'index'])->name('home');

    Route::resource('projects', ProjectController::class)->except(['show']);
    Route::resource('tasks', TaskController::class)->except(['show']);

    Route::get('projects/{project}/tasks-json', function(App\Models\Project $project) {
        return $project->tasks()->with('employee')->get()->map(function($task){
            return [
                'id' => $task->id,
                'title' => $task->title,
                'end_date' => $task->end_date,
                'status' => $task->status,
                'employee_full_name' => $task->employee->full_name ?? '',
            ];
        });
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
