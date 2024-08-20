<?php

namespace App\Http\Controllers;

use App\Models\Project;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class DevController extends Controller
{
    public function index(Request $request, string $action = null)
    {
        if ($action === null) {
            $result = '<p>Available actions:</p><ul>';
            foreach (array_diff(get_class_methods($this), get_class_methods(Controller::class)) as $method) {
                if ($method !== 'index') {
                    $result .= '<li><a href="/dev/' . $method . '">' . $method . '</a></li>';
                }
            }

            return $result . '</ul>';
        }

        if (method_exists($this, $action)) {
            return $this->{$action}($request);
        }

        return null;
    }

    public function test()
    {
    }

    /**
     * @return \Illuminate\Container\Container|mixed|object
     *
     * Вернет конфигурационные данные dummy json
     */
    public function getDummyConfig()
    {
        return config('services.dummy');
    }

    /**
     * Добавить опр. кол-во проектов
     */
    public function addProject()
    {
        try {
            Project::factory(5)->create();
            $message = "Успешно создали 5 проектов";
        } catch (\Exception $e) {
            $message = "Не удалось создать проект: " . $e->getMessage();
        }

        return response()->json($message);
    }

    /**
     * Выводит список проектов админов с информацией об админе
     * @return array
     */
    public function getAdminProjects()
    {
        return Project::with('owner')->whereRelation('owner', 'role', '=', 'admin')->get()->toArray();
    }

    /**
     * Выводит список проектов админов с информацией об админе
     * @return array
     *
     * @var $deadline - дата включительно, по которую все проекты считаются просроченными
     */
    public function getExpired()
    {
        $deadline = Carbon::now()->toDateString();

        return Project::query()->whereDate('deadline_date', '<=', $deadline)->orderBy('deadline_date', 'asc')->get(
        )->toArray();
    }

    /**
     * Обновляем рандомный объект
     * @return array
     */
    public function updateRandom()
    {
        try {
            $project = Project::query()->inRandomOrder()->firstOrFail();
            $project->update(Project::factory()->make()->toArray());
            $message = "Запись ID: {$project->id} обновлена";
        } catch (\Exception $e) {
            $message = "Не удалось обновить запись: " . $e->getMessage();
        }

        return response()->json($message);
    }
}
