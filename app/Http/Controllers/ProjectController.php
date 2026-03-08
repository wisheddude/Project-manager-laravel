<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('tasks')->get();
        return view('home', compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'nullable|string',
           'start_date' => 'nullable|date',
           'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Project::create($validated);
        return redirect()->route('home')->with('success', 'Проект успешно создан');
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
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
           'name' => 'required|string|max:255',
           'description' => 'nullable|string',
           'start_date' => 'nullable|date',
           'end_date' => 'nullable|date|after_or_equal:start_date',
           'status' => 'required|in:черновик,в работе,завершен,заморожен'
        ]);
        $project->update($validated);
        return redirect()->route('home')->with('success', 'Проект успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('home')->with('success', 'Проект успешно удалён');
    }
}
