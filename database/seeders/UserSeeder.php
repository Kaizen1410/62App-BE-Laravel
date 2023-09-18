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
                'updated_at' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'email' => 'luthfi@gmail.com',
                'password' => bcrypt('password'),
                'employee_id' => 2,
                'updated_at' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
            ],
            [
                'email' => 'vickry@gmail.com',
                'password' => bcrypt('password'),
                'employee_id' => 3,
                'updated_at' => date("Y-m-d H:i:s"),
                'created_at' => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
