<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProjectPolicy
{
    use HandlesAuthorization;

    /**
     * Просмотр всех проектов
     */
    public function viewAll(User $user): bool
    {
        return true;
    }

    /**
     * Просмотр одного проекта
     */
    public function show(User $user): bool
    {
        return true;
    }

    /**
     * Создание проектов (страница)
     */
    public function create(User $user): bool
    {
        return true;
    }


    /**
     * Обновление данных по проекту
     */
    public function update(User $user, Project $project): bool
    {
        return $user->role === 'admin' or $project->owner->id === $user->id;
    }

    /**
     * Удаление проекта
     */
    public function delete(User $user, Project $project): bool
    {
       return $user->role === 'admin' or $project->owner->id === $user->id;
    }

}
