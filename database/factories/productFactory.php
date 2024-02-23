<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'des'=>fake()->text(),
            'image'=>fake()->text(),
            'price'=>fake()->numberBetween(0,1000),
            'quantity_has'=>fake()->numberBetween(0,1000),
            'quantity_buy'=>fake()->numberBetween(0,1000),
            'cat_id'=>fake()->numberBetween(1,5),
        ];
    }
}
