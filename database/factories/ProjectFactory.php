<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'http://10.10.10.221:8000/Aesthetic Anime Wallpapers - WallpaperSafari.jfif',
            'http://10.10.10.221:8000/download.jfif'
        ];

        $start_date = fake()->dateTimeBetween('-3 years', '1 years');
        $end_date = fake()->dateTimeBetween('-2 years', '1 years');
        if($end_date < $start_date) {
            $end_date = $start_date;
        }

        $total_story_point = rand(80, 200);
        $done_story_point = rand(0, 200);
        if($done_story_point > $total_story_point) {
            $done_story_point = $total_story_point;
        }
        $status = $done_story_point == $total_story_point ? 3 : rand(1, 2);

        return [
            'name' => fake()->sentence(2),
            'description' => fake()->sentence(20),
            'start_date' => $start_date,
            'end_date' => $end_date,
            'image_url' => fake()->randomElement($images),
            'total_story_point' => $total_story_point,
            'done_story_point' => $done_story_point,
            'status' => $status,
        ];
    }
}
