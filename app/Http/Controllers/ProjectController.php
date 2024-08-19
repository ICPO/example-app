<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('pages.Project.Index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()->select('id', 'username')->get();

        return view('pages.Project.Create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreRequest $request
     *
     */
    public function store(ProjectStoreRequest $request, Project $project)
    {
        Project::create($request->validated());

        return redirect()->route('projects.index')->with(
            ['alertMessage' => 'Проект создан', 'alertType' => 'success']
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('pages.Project.Show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Project $project)
    {
        $users = User::pluck('username','id');

        return view('pages.Project.Edit', ['project' => $project, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectUpdateRequest $request
     *
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $project->update($request->validated());

        return redirect()->route('projects.show', $project->id)->with(
            ['alertMessage' => 'Проект обновлен', 'alertType' => 'success']
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')->with(
            ['alertMessage' => 'Проект удален', 'alertType' => 'success']
        );
    }
}
