<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource. (10)
     */
    public function index()
    {
        return Inertia::render('Project/Index', [
            'projects' => Project::all(), // (1)
            'users' => User::pluck('username', 'id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Project/Create', [
            'users' => User::pluck('username', 'id'),
            'default_assigned_to' => (int) env('PROJECT_DEFAULT_ASSIGNEE'), // (2)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ // (3)
            'name' => 'required',
            'description' => 'required',
            'assigned_to' => 'required',
        ]);

        Project::create($request->all());

        return redirect()->route('projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) // (5)
    {
        $instance = Project::findOrFail($id); // (6)
        return Inertia::render('Project/Edit', [
            'initialValues' => $instance->toArray(), // (7)
            'users' => User::pluck('username', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        // (9)
        $project->name = $request->name;
        $project->description = $request->description;
        $project->assigned_to = $request->assigned_to();
        $project->save();

        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
