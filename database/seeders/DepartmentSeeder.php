<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $departments = [
            'Отдел информационных и коммуникационных технологий',
            'Отдел производства автосамосвалов',
            'Отдел автобусного производства',
            'Отдел производства вахтовых автомобилей и цистерн',
        ];

        foreach ($departments as $item) {
            Department::create([
               'name' => $item,
            ]);
        }
    }
}
