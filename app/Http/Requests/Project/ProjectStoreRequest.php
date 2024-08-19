<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class ProjectStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'owner_id' => 'required|integer',
            'assignee_id' => 'required|integer',
            'deadline_date' => 'required|date',
            'is_active' => 'sometimes|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title' => 'Поле «Заголовок проекта» обязательно к заполнению',
            'owner_id' => 'Поле «Владелец проекта» обязательно к заполнению',
            'assignee_id' => 'Поле «Ответственный за проект» обязательно к заполнению',
            'deadline_date' => 'Поле «Дата сдачи проекта» обязательно к заполнению',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['is_active' => $this->is_active ? true : false])->all();
    }
}
