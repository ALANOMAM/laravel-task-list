<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'title' => fake()->sentence,
            // 'description' => fake()->paragraph,//property version of the word paragraph
            // 'long_description' => fake()->paragraph(7,true), //i want 7 sentences (function version of the word paragraph)
            // 'completed' => fake()->boolean,

    'title' => fake()->randomElement([
    'Buy groceries',
    'Finish project report',
    'Call the bank',
    'Schedule team meeting',
    'Write blog post',
        ]),
    'description' => implode(' ', fake()->paragraphs(1)), // 1 paragraph
    'long_description' => implode("\n\n", fake()->paragraphs(3)), // 3 paragraphs
    'completed' => fake()->boolean,

        ];

    }
}
