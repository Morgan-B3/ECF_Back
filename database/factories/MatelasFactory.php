<?php

namespace Database\Factories;

use App\Models\Matelas;
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
        $price =  fake()->numberBetween(750,1200);
        $discount = fake()->randomElement([null, fake()->numberBetween(5,20)]);
        return [
            'name' => fake()->sentence(1),
            'price' => $price,
            'discount' => $discount,
            'discounted_price' => Matelas::discount($price, $discount),
            'image' => fake()->randomElement(['mattress_1.jpg','mattress_2.jpg','mattress_3.jpg','mattress_4.jpg',]),
        ];
    }
}
