<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use \Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed> 
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ru_RU');
        $title = $faker->sentence(5);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'image_path' => fake()->randomElement([
                'images/view-summer-pool-float.jpg',
                'images/view-balloon-twist-sculpture.jpg',
                'images/rubber-ducks-arrangement-still-life.jpg',
                'images/cute-rubber-duck-still-life.jpg',
                'images/closeup-rubber-duckies.jpg',
                'images/closeup-rubber-duckies2.jpg',
            ]),
            'description' => $faker->sentence(10),
            'publication_at' => Carbon::now()->subDays(rand(1, 5)),
            'expires_at' => Carbon::now()->addDays(rand(4, 10)),
            'status' => true,
        ];
    }
}
