<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->company(),
            'duration' =>fake()->randomDigit(),
            'description' =>fake()->paragraph(),
            'instructor' =>fake()->name(),
            'fees' =>fake()->randomNumber(3,true),
            'discount_fees' =>fake()->randomNumber(3,true),
            'image'=>"https://picsum.photos/400"
        ];
    }
}
