<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Funko>
 */
class FunkoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name(),
            'precio' => $this->faker->randomFloat(2, 1, 100),
            'imagen' => $this->faker->imageUrl(640, 480, 'funko'),
            'cantidad' => $this->faker->numberBetween(1, 100),
            'categoria_id' => $this->faker->numberBetween(1, 5),
            'isDeleted' => false,
        ];
    }
}
