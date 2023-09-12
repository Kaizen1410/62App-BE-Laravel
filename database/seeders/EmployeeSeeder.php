<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::insert([
            [
                'name' => 'Ahmad Muhajir',
                'employee_position_id' => 1,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Luthfi',
                'employee_position_id' => 1,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Vickry Kamaludin',
                'employee_position_id' => 1,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->name(),
                'employee_position_id' => 2,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->name(),
                'employee_position_id' => 3,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->name(),
                'employee_position_id' => 4,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->name(),
                'employee_position_id' => 5,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->name(),
                'employee_position_id' => 6,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->name(),
                'employee_position_id' => 7,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->name(),
                'employee_position_id' => 8,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->name(),
                'employee_position_id' => 9,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
        ]);
    }
}
