<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            [
                'name' => 'Super Admin',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => 'Employee',
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'name' => fake()->sentence(2),
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
        ]);
    }
}
