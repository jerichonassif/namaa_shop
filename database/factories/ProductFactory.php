<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text,
            'image' => 'products_'.rand(0,10).'.jpg',
            'Stock' => rand(0,100),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
