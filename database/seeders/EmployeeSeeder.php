<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Employee::factory()->count(20)->create();
        Employee::create([
            'full_name' => 'Тестовый пользователь',
            'email' => 'mail@example.com',
            'position' => 'Администратор системы',
            'department_id' => Department::inRandomOrder()->first()->id,
            'password' => Hash::make('passwd'),
        ]);
    }
}
