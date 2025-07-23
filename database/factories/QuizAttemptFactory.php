<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuizAttempt>
 */
class QuizAttemptFactory extends Factory
{
    protected $model = QuizAttempt::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startedAt = $this->faker->dateTimeBetween('-3 months', 'now');
        $completedAt = $this->faker->boolean(80) ? 
            $this->faker->dateTimeBetween($startedAt, '+2 hours') : null;
        
        $correctCount = $this->faker->numberBetween(0, 20);
        $wrongCount = $this->faker->numberBetween(0, 20);
        $totalQuestions = $correctCount + $wrongCount;
        $score = $totalQuestions > 0 ? ($correctCount / $totalQuestions) * 100 : 0;
        $percentage = round($score, 2);

        return [
            'user_id' => User::factory(),
            'quiz_id' => Quiz::factory(),
            'started_at' => $startedAt,
            'completed_at' => $completedAt,
            'score' => $score,
            'correct_count' => $correctCount,
            'wrong_count' => $wrongCount,
            'percentage' => $percentage,
            'created_at' => $startedAt,
            'updated_at' => $completedAt ?? $startedAt,
        ];
    }

    /**
     * Create an incomplete quiz attempt
     */
    public function incomplete(): static
    {
        return $this->state(fn (array $attributes) => [
            'completed_at' => null,
            'score' => 0,
            'correct_count' => 0,
            'wrong_count' => 0,
            'percentage' => 0,
        ]);
    }

    /**
     * Create a completed quiz attempt
     */
    public function completed(): static
    {
        return $this->state(function (array $attributes) {
            $correctCount = $this->faker->numberBetween(1, 25);
            $wrongCount = $this->faker->numberBetween(0, 15);
            $totalQuestions = $correctCount + $wrongCount;
            $score = ($correctCount / $totalQuestions) * 100;
            
            return [
                'completed_at' => $this->faker->dateTimeBetween($attributes['started_at'], '+2 hours'),
                'score' => $score,
                'correct_count' => $correctCount,
                'wrong_count' => $wrongCount,
                'percentage' => round($score, 2),
            ];
        });
    }

    /**
     * Create a high scoring attempt (80-100%)
     */
    public function highScore(): static
    {
        return $this->state(function (array $attributes) {
            $totalQuestions = $this->faker->numberBetween(10, 30);
            $correctCount = (int) ($totalQuestions * $this->faker->randomFloat(2, 0.8, 1.0));
            $wrongCount = $totalQuestions - $correctCount;
            $score = ($correctCount / $totalQuestions) * 100;
            
            return [
                'completed_at' => $this->faker->dateTimeBetween($attributes['started_at'], '+2 hours'),
                'score' => $score,
                'correct_count' => $correctCount,
                'wrong_count' => $wrongCount,
                'percentage' => round($score, 2),
            ];
        });
    }

    /**
     * Create a low scoring attempt (0-50%)
     */
    public function lowScore(): static
    {
        return $this->state(function (array $attributes) {
            $totalQuestions = $this->faker->numberBetween(10, 30);
            $correctCount = (int) ($totalQuestions * $this->faker->randomFloat(2, 0, 0.5));
            $wrongCount = $totalQuestions - $correctCount;
            $score = $totalQuestions > 0 ? ($correctCount / $totalQuestions) * 100 : 0;
            
            return [
                'completed_at' => $this->faker->dateTimeBetween($attributes['started_at'], '+2 hours'),
                'score' => $score,
                'correct_count' => $correctCount,
                'wrong_count' => $wrongCount,
                'percentage' => round($score, 2),
            ];
        });
    }

    /**
     * Create attempt for specific user and quiz
     */
    public function forUserAndQuiz(User $user, Quiz $quiz): static
    {
        return $this->state(fn (array $attributes) => [
            'user_id' => $user->id,
            'quiz_id' => $quiz->id,
        ]);
    }

    /**
     * Create attempt with perfect score
     */
    public function perfect(): static
    {
        return $this->state(function (array $attributes) {
            $correctCount = $this->faker->numberBetween(10, 30);
            
            return [
                'completed_at' => $this->faker->dateTimeBetween($attributes['started_at'], '+2 hours'),
                'score' => 100.0,
                'correct_count' => $correctCount,
                'wrong_count' => 0,
                'percentage' => 100.0,
            ];
        });
    }
}