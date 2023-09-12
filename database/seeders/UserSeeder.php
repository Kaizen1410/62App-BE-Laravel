<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'email' => 'amuhajir.syamlan@gmail.com',
                'password' => bcrypt('password'),
                'employee_id' => 1,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => 'luthfi@gmail.com',
                'password' => bcrypt('password'),
                'employee_id' => 2,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => 'vickry@gmail.com',
                'password' => bcrypt('password'),
                'employee_id' => 3,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'employee_id' => 4,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'employee_id' => 5,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'employee_id' => 6,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'employee_id' => 7,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'employee_id' => 8,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'employee_id' => 9,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'employee_id' => 10,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
            [
                'email' => fake()->email(),
                'password' => bcrypt('password'),
                'employee_id' => 11,
                'updated_at' => fake()->dateTime(),
                'created_at' => fake()->dateTime(),
            ],
        ]);
    }
}
