<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'nis' => fake()->unique()->numerify('019#####'),
            'classroom_id' => Classroom::factory(),
            'address' => fake()->address(),
            'is_active' => fake()->boolean(85),
        ];
    }
}
