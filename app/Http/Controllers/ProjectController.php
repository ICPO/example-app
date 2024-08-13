<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    // хардкод для урока

    private $dataset = [
        1 => [
            'id' => 1,
            'title' => 'Проект 1',
            'deadline_date' => '13.08.2024',
        ],
        2 => [
            'id' => 2,
            'title' => 'Проект 2',
            'deadline_date' => '15.08.2024',
        ],
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.Project.Index',['projects'=>$this->dataset]);
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
        $projectModel = null;
        if (isset($this->dataset[$project])) {
            $projectModel = $this->dataset[$project];
        }

        return view('pages.Project.Show',['projectModel'=>$projectModel]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(int $project)
    {
        $projectModel = null;
        if (isset($this->dataset[$project])) {
            $projectModel = $this->dataset[$project];
        }
        return view('pages.Project.Edit',['projectModel'=>$projectModel]);
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
