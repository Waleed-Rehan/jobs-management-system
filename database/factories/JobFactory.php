<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(),
            'location' => $this->faker->city(),
            'salary' => $this->faker->numberBetween(20000, 120000),
            'employment_type' => $this->faker->randomElement(['full-time', 'part-time', 'contract', 'freelance']),
            'experience_level' => $this->faker->randomElement(['Junior', 'Mid', 'Senior']),
        ];
    }
    
}
