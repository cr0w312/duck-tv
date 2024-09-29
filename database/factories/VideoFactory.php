<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(4);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'youtube_id' => 'racmy7Y9P4M',
            'image_path' => fake()->randomElement([
                'images/view-summer-pool-float.jpg',
                'images/view-balloon-twist-sculpture.jpg',
                'images/rubber-ducks-arrangement-still-life.jpg',
                'images/cute-rubber-duck-still-life.jpg',
                'images/closeup-rubber-duckies.jpg',
                'images/closeup-rubber-duckies2.jpg',
            ]),
            'description' => fake()->sentence(10),
            'status' => true,
        ];
    }
}
