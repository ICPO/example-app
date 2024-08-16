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

        return view('pages.Project.Index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::query()->select('id', 'username')->get();

        return view('pages.Project.Create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreRequest $request
     *
     */
    public function store(ProjectStoreRequest $request)
    {
        $validated = $request->validated();

        Project::create($validated);

        return redirect()->route('projects.index')->with(
            ['alertMessage' => 'Проект создан', 'alertType' => 'success']
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(int $project)
    {
        $project = Project::findOrFail($project);

        return view('pages.Project.Show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(int $project)
    {
        $project = Project::findOrFail($project);
        $users = User::query()->select('id','username')->get();

        return view('pages.Project.Edit', compact('project','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectUpdateRequest $request
     *
     */
    public function update(ProjectUpdateRequest $request)
    {
        $validated = $request->validated();
        $project = Project::findOrFail($request->project);
        $project->fill($validated)->save();

        return redirect()->route('projects.show',$request->project)->with(
            ['alertMessage' => 'Проект обновлен', 'alertType' => 'success']
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $project)
    {
        $project = Project::findOrFail($project);
        $project->delete();

        return redirect()->route('projects.index')->with(
            ['alertMessage' => 'Проект удален', 'alertType' => 'success']
        );
    }
}
