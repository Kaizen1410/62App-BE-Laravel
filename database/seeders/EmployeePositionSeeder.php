<?php

namespace Database\Seeders;

use App\Models\EmployeePosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeePosition::insert([
            [
                'name' => 'Junior Developer',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Senior Developer',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Junior Project Manager',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Senior Project Manager',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Junior Quality Assurance',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Senior Quality Assurance',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Junior Design',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Senior Design',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Junior Business Analytic',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Senior Business Analytic',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'CEO',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
        ]);
    }
}
