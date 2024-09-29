<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ru_RU');
        return [
            'title' => $faker->word(),
            'text_color' => 'text-brand-tag',
            'bg_color' => 'bg-brand-tag-primary',
        ];
    }
}
