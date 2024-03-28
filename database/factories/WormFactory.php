<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worm>
 */
class WormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'species' => $this->faker->word(),
            'age' => $this->faker->numberBetween(1, 100),
            'number_of_segments' => $this->faker->numberBetween(1, 100),
            'number_of_hearts' => 5,
            'about_me' => $this->faker->sentence(),
            'habitat' => $this->faker->sentence(),
            'hobbies' => $this->faker->sentence(),
            'graditude' => $this->faker->sentence(),
            'passion' => $this->faker->sentence(),
            'ideal_match' => $this->faker->sentence(),
            'email' => $this->faker->email(),
            'avatar_url' => $this->faker->imageUrl(),
        ];
    }
}
