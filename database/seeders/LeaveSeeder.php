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
                'employee_id' => 2,
                'date_leave' => '2023-09-11',
                'is_approved' => false,
            ]
            ]);
    }
}
