<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\user_product>
 */
class user_productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'=>fake()->numberBetween(2,27),
            'user_id'=>1,
            'quantity'=>fake()->numberBetween(1,100),
            'check_in'=>fake()->boolean,
        ];
    }
}
