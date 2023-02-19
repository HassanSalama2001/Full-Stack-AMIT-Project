<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(4000, 7000),
            'quantity' => $this->faker->numberBetween(1, 200),
            'categories_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->image(),
        ];
    }
}
