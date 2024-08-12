<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Метод вывода данных (Index)";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Метод вывода формы создания данных (Create)";
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
        return "Метод вывода конкретных данных (Show)";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $project)
    {
        return "Метод редактирования конкретных данных (Edit)";
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
