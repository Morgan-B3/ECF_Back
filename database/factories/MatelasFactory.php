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
            'price' => fake()->numberBetween(750,1200),
            'discount' => fake()->randomElement([null, fake()->numberBetween(5,20)]),
            'discounted_price' => null,
            'image' => fake()->randomElement(['/images/mattress_1.jpg','/images/mattress_2.jpg','/images/mattress_3.jpg','/images/mattress_4.jpg',]),
        ];
    }
}
