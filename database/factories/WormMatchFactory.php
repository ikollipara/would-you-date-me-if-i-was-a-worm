<?php

namespace Database\Factories;

use App\Models\Worm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WormMatch>
 */
class WormMatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'worm_id' => Worm::factory(),
            'match_id' => Worm::factory(),
            'worm_approved' => $this->faker->boolean(),
            'match_approved' => $this->faker->boolean(),
        ];
    }

    public function mutual()
    {
        return $this->state(function (array $attributes) {
            return [
                'worm_approved' => true,
                'match_approved' => true,
            ];
        });
    }
}
