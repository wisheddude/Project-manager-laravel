<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->paragraph(),
            'end_date' => $this->faker->dateTimeBetween('+1 week', '+3 months'),
            'status' => $this->faker->randomElement([
               'не начата',
               'в процессе',
               'завершена'
            ]),
            'project_id' => Project::inRandomOrder()->first()->id,
            'employee_id' => Employee::inRandomOrder()->first()->id,
        ];
    }
}
