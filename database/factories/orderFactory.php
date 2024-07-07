<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class orderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomNumber(1,15),
            'product_id' => $this->faker->randomNumber(1,5),
            'material' => $this->faker->randomElement(['HVS', 'Art Paper', 'Ivory', 'Linen', 'Manila']),
            'size' => $this->faker->randomElement(['A3', 'A4', 'A5', 'B4', 'B5']),
            'file' => 'data.pdf',
            'pages' => $this->faker->randomNumber(1,3),
            'quantity' => $this->faker->randomNumber(1,10),
            'price' => $this->faker->randomNumber(5),
            'status' => 'pending'
        ];
    }
}
