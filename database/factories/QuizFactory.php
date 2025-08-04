<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3, 6),
            'description' => $this->faker->paragraph(2, 4),
            'duration_minutes' => $this->faker->randomElement([15, 30, 45, 60, 90, 120]),
            'created_by' => User::factory(),
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * Create a quiz with specific duration
     */
    public function withDuration(int $minutes): static
    {
        return $this->state(fn (array $attributes) => [
            'duration_minutes' => $minutes,
        ]);
    }

    /**
     * Create a short quiz (15-30 minutes)
     */
    public function short(): static
    {
        return $this->state(fn (array $attributes) => [
            'duration_minutes' => $this->faker->randomElement([15, 30]),
        ]);
    }

    /**
     * Create a long quiz (60-120 minutes)
     */
    public function long(): static
    {
        return $this->state(fn (array $attributes) => [
            'duration_minutes' => $this->faker->randomElement([60, 90, 120]),
        ]);
    }

    /**
     * Create quiz with specific creator
     */
    public function createdBy(User $user): static
    {
        return $this->state(fn (array $attributes) => [
            'created_by' => $user->id,
        ]);
    }
}