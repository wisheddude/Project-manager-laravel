<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $employees = Employee::all();
        return view('tasks.create', compact('projects', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'title' => 'required|string|max:255',
           'description' => 'nullable|string',
           'end_date' => 'nullable|date|after_or_equal:today',
           'project_id' => 'required|exists:projects,id',
           'employee_id' => 'required|exists:employees,id',
        ]);

        $validated['status'] = 'не начата';

        Task::create($validated);
        return redirect()->route('home')->with('success', 'Задача успешно создана');
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
    public function edit(Task $task)
    {
        $projects = Project::all();
        $employees = Employee::all();
        return view('tasks.edit', compact('task', 'projects', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'end_date' => 'nullable|date|after_or_equal:today',
            'status' => 'required|in:не начата,в процессе,завершена',
            'project_id' => 'required|exists:projects,id',
            'employee_id' => 'required|exists:employees,id',
        ]);

        $task->update($validated);
        return redirect()->route('home')->with('success', 'Задача успешно обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('home')->with('success', 'Задача успешно удалена');
    }
}
