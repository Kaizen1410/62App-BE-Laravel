<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leave>
 */
class LeaveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::all()->pluck('id');

        return [
            'employee_id' => fake()->randomElement($userIds),
            'date_leave' => fake()->dateTimeBetween('now', '+2 years'),
            'is_approved' => false,
            'approved_by' => null,
        ];
    }
}
