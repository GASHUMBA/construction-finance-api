<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(10); // fetch 10 projects per page
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'client'      => 'required|string|max:255',
            'email'       => 'nullable|email',
            'phone'       => 'nullable|string|max:20',
            'address'     => 'nullable|string|max:255',
            'status'      => 'required|string',
            'start_date'  => 'nullable|date',
            'deadline'    => 'nullable|date',
            'budget'      => 'nullable|numeric',
            'cost'        => 'nullable|numeric',
            'profit'      => 'nullable|numeric',
            'description' => 'nullable|string',
            'manager_id'  => 'nullable|exists:users,id',
        ]);

        Project::create($validated);

        return redirect()->route('projects.index')
                         ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified project.
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'client'      => 'required|string|max:255',
            'email'       => 'nullable|email',
            'phone'       => 'nullable|string|max:20',
            'address'     => 'nullable|string|max:255',
            'status'      => 'required|string',
            'start_date'  => 'nullable|date',
            'deadline'    => 'nullable|date',
            'budget'      => 'nullable|numeric',
            'cost'        => 'nullable|numeric',
            'profit'      => 'nullable|numeric',
            'description' => 'nullable|string',
            'manager_id'  => 'nullable|exists:users,id',
        ]);

        $project->update($validated);

        return redirect()->route('projects.index')
                         ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success', 'Project deleted successfully.');
    }
}
