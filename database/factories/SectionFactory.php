<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Section>
 */
class SectionFactory extends Factory
{
    protected $model = Section::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::inRandomOrder()->first()->id,
            'name' => $this->faker->sentence(2, 4),
            'order' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * Create section for specific quiz
     */
    public function forQuiz(Quiz $quiz): static
    {
        return $this->state(fn (array $attributes) => [
            'quiz_id' => $quiz->id,
        ]);
    }

    /**
     * Create section with specific order
     */
    public function withOrder(int $order): static
    {
        return $this->state(fn (array $attributes) => [
            'order' => $order,
        ]);
    }

    /**
     * Create sections with sequential order for a quiz
     */
    public function sequential(): static
    {
        static $orderCounter = 1;
        
        return $this->state(fn (array $attributes) => [
            'order' => $orderCounter++,
        ]);
    }

    /**
     * Create section with programming topics
     */
    public function programming(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $this->faker->randomElement([
                'Basic Syntax',
                'Data Types and Variables', 
                'Control Structures',
                'Functions and Methods',
                'Object-Oriented Programming',
                'Error Handling',
                'Database Integration',
                'Advanced Concepts'
            ]),
        ]);
    }

    /**
     * Create section with math topics
     */
    public function mathematics(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $this->faker->randomElement([
                'Basic Operations',
                'Algebra Fundamentals',
                'Geometry Basics',
                'Trigonometry',
                'Calculus Introduction',
                'Statistics and Probability',
                'Linear Equations',
                'Problem Solving'
            ]),
        ]);
    }

    /**
     * Create section with science topics
     */
    public function science(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $this->faker->randomElement([
                'Scientific Method',
                'Matter and Energy',
                'Chemical Reactions',
                'Biological Systems',
                'Physics Laws',
                'Environmental Science',
                'Laboratory Techniques',
                'Data Analysis'
            ]),
        ]);
    }

    /**
     * Create section with general academic topics
     */
    public function academic(): static
    {
        return $this->state(fn (array $attributes) => [
            'name' => $this->faker->randomElement([
                'Introduction',
                'Fundamental Concepts',
                'Key Principles',
                'Practical Applications',
                'Case Studies',
                'Advanced Topics',
                'Review and Summary',
                'Final Assessment'
            ]),
        ]);
    }
}