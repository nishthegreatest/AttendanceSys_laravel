<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SchoolClass>
 */
class SchoolClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_name' => 'Class ' . $this->faker->randomElement(['A', 'B', 'C']),
            'section' => $this->faker->randomElement(['1', '2', '3']),
            'teacher_name' => $this->faker->name,
        ];
    }
}