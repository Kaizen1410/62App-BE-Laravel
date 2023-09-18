<?php

namespace Database\Seeders;

use App\Models\Leave;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leave::insert([
            [
                'employee_id' => 3,
                'date_leave' => fake()->dateTimeBetween('-1 years', 'now'),
                'is_approved' => true,
                'approved_by' => 1,
            ],
            [
                'employee_id' => 1,
                'date_leave' => fake()->dateTimeBetween('-1 years', 'now'),
                'is_approved' => true,
                'approved_by' => 1,
            ],
            [
                'employee_id' => 3,
                'date_leave' => fake()->dateTimeBetween('-1 years', 'now'),
                'is_approved' => true,
                'approved_by' => 1,
            ],
            [
                'employee_id' => 1,
                'date_leave' => fake()->dateTimeBetween('-1 years', 'now'),
                'is_approved' => true,
                'approved_by' => 1,
            ],
            [
                'employee_id' => 3,
                'date_leave' => fake()->dateTimeBetween('-1 years', 'now'),
                'is_approved' => true,
                'approved_by' => 1,
            ],
            [
                'employee_id' => 1,
                'date_leave' => fake()->dateTimeBetween('-1 years', 'now'),
                'is_approved' => true,
                'approved_by' => 1,
            ],
        ]);

        Leave::factory(100)->create();
    }
}
