<?php

namespace App\Http\Requests\Project;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProjectUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|max:255',
            'assigned_to' => 'sometimes|exists:users,id',
        ];
    }
}
