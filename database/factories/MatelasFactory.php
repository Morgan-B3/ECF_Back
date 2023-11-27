<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MatelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(1),
            'brand' => fake()->randomElement(['EPEDA', 'DREAMWAY', 'BULTEX', 'DORSOLINE', 'MEMORYLINE']),
            'dimension' => fake()->randomElement(['90x190', '140x190', '160x200', '180x200', '200x200']),
            'price' => fake()->numberBetween(750,1200),
            'discount' => fake()->randomElement([null, fake()->numberBetween(5,20)]),
            'image' => fake()->imageUrl(),
        ];
    }
}
