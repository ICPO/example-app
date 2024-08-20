<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::pluck('id');

        return [
            'owner_id' => fake()->randomElement($users),
            'title' => fake()->word(),
            'is_active' => fake()->randomElement([true, false]),
            'assignee_id' => fake()->randomElement($users),
            'deadline_date' => fake()->dateTimeBetween(Date::now()->subMonth(), 'now'),
        ];
    }
}
