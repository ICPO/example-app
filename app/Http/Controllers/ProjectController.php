<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\ProjectStoreRequest;
use App\Http\Requests\Project\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\User;
use App\Policies\ProjectPolicy;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAll', Project::class);

        $projects = Project::all();

        return view('pages.Project.Index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Project::class);
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
        Gate::authorize('create', $project);
        $project::create($request->validated());

        return redirect()->route('projects.index')->with(
            ['alertMessage' => 'Проект создан', 'alertType' => 'success']
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        Gate::authorize('show', $project);

        return view('pages.Project.Show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Project $project)
    {
        Gate::authorize('update', $project);
        $users = User::pluck('username', 'id');

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
        Gate::authorize('update', $project);

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
        Gate::authorize('delete', $project);
        $project->delete();

        return redirect()->route('projects.index')->with(
            ['alertMessage' => 'Проект удален', 'alertType' => 'success']
        );
    }
}
