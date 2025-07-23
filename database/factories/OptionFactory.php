<?php

namespace Database\Factories;

use App\Models\Option;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    protected $model = Option::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question_id' => Question::factory(),
            'option_text' => $this->faker->sentence(3, 6),
            'is_correct' => false, // Default to false, will be set by states
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * Create correct option
     */
    public function correct(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_correct' => true,
        ]);
    }

    /**
     * Create incorrect option
     */
    public function incorrect(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_correct' => false,
        ]);
    }

    /**
     * Create option for specific question
     */
    public function forQuestion(Question $question): static
    {
        return $this->state(fn (array $attributes) => [
            'question_id' => $question->id,
        ]);
    }

    /**
     * Create programming-related options
     */
    public function programming(): static
    {
        return $this->state(fn (array $attributes) => [
            'option_text' => $this->faker->randomElement([
                'function myFunction() { return true; }',
                '$variable = "Hello World";',
                'if ($condition == true) { echo "Yes"; }',
                'for ($i = 0; $i < 10; $i++) { echo $i; }',
                'class MyClass { public $property; }',
                'array_push($array, $value);',
                'SELECT * FROM users WHERE id = 1;',
                'const API_KEY = "your-api-key";'
            ]),
        ]);
    }

    /**
     * Create math-related options
     */
    public function mathematics(): static
    {
        return $this->state(fn (array $attributes) => [
            'option_text' => $this->faker->randomElement([
                $this->faker->numberBetween(1, 100),
                $this->faker->randomFloat(2, 0, 100),
                $this->faker->numberBetween(-50, 50),
                'x = ' . $this->faker->numberBetween(1, 20),
                $this->faker->numberBetween(1, 360) . '°',
                $this->faker->randomFloat(3, 0, 1),
                '√' . $this->faker->numberBetween(1, 100),
                $this->faker->numberBetween(1, 12) . '/12'
            ]),
        ]);
    }

    /**
     * Create science-related options
     */
    public function science(): static
    {
        return $this->state(fn (array $attributes) => [
            'option_text' => $this->faker->randomElement([
                'H₂O',
                'CO₂',
                'O₂',
                'Mercury',
                'Venus',
                'Earth',
                'Mars',
                'Mitochondria',
                'Nucleus',
                'Chloroplast',
                'Hydrogen',
                'Oxygen',
                'Carbon',
                'Nitrogen'
            ]),
        ]);
    }

    /**
     * Create true/false options
     */
    public function trueFalse(): static
    {
        return $this->state(fn (array $attributes) => [
            'option_text' => $this->faker->randomElement(['True', 'False']),
        ]);
    }

    /**
     * Create a set of multiple choice options for a question
     */
    public static function createSetForQuestion(Question $question, int $count = 4): \Illuminate\Database\Eloquent\Collection
    {
        $options = collect();
        
        // Create one correct option
        $correctOption = Option::factory()
            ->forQuestion($question)
            ->correct()
            ->create();
        $options->push($correctOption);
        
        // Create incorrect options
        for ($i = 1; $i < $count; $i++) {
            $incorrectOption = Option::factory()
                ->forQuestion($question)
                ->incorrect()
                ->create();
            $options->push($incorrectOption);
        }
        
        return $options;
    }

    /**
     * Create True/False option set
     */
    public static function createTrueFalseSet(Question $question, bool $correctAnswer = true): \Illuminate\Database\Eloquent\Collection
    {
        $options = collect();
        
        // Create True option
        $trueOption = Option::factory()
            ->forQuestion($question)
            ->trueFalse()
            ->state([
                'option_text' => 'True',
                'is_correct' => $correctAnswer === true
            ])
            ->create();
        $options->push($trueOption);
        
        // Create False option
        $falseOption = Option::factory()
            ->forQuestion($question)
            ->trueFalse()
            ->state([
                'option_text' => 'False',
                'is_correct' => $correctAnswer === false
            ])
            ->create();
        $options->push($falseOption);
        
        return $options;
    }
}