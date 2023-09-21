<?php

namespace Database\Seeders;

use App\Models\ProjectEmployee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectEmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProjectEmployee::factory(30)->create();
    }
}
