<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('pages.Project.Index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.Project.Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Метод сохранения данных после create (Store)";
    }

    /**
     * Display the specified resource.
     */
    public function show(int $project)
    {
        $project = Project::find($project);
        return view('pages.Project.Show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(int $project)
    {
        $project = Project::find($project);
        return view('pages.Project.Edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $project)
    {
        return "Метод обновление данных после Edit (Update)";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $projectId)
    {
        return "Метод удаления данных (Destroy)";
    }
}
