<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $questionTypes = ['multiple_choice', 'true_false', 'fill_blank'];
        $type = $this->faker->randomElement($questionTypes);
        
        return [
            'section_id' => Section::factory(),
            'type' => $type,
            'question_text' => $this->generateQuestionText($type),
            'audio_url' => $this->faker->boolean(20) ? $this->faker->url() : null,
            'explanation' => $this->faker->paragraph(2, 3),
            'created_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'updated_at' => function (array $attributes) {
                return $this->faker->dateTimeBetween($attributes['created_at'], 'now');
            },
        ];
    }

    /**
     * Generate question text based on type
     */
    private function generateQuestionText(string $type): string
    {
        return match($type) {
            'multiple_choice' => $this->faker->sentence() . '?',
            'true_false' => $this->faker->sentence() . ' - True or False?',
            'fill_blank' => $this->faker->sentence() . ' _____.',
            default => $this->faker->sentence() . '?'
        };
    }

    /**
     * Create multiple choice question
     */
    public function multipleChoice(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'multiple_choice',
            'question_text' => $this->faker->randomElement([
                'Which of the following is correct?',
                'What is the best approach for this scenario?',
                'Select the most appropriate answer:',
                'Which option describes the concept accurately?',
                'What is the primary function of this element?'
            ]),
        ]);
    }

    /**
     * Create true/false question
     */
    public function trueFalse(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'true_false',
            'question_text' => $this->faker->randomElement([
                'This statement is always correct - True or False?',
                'The given principle applies in all cases - True or False?',
                'This method is the most efficient approach - True or False?',
                'The concept described is fundamental - True or False?',
                'This rule has no exceptions - True or False?'
            ]),
        ]);
    }

    /**
     * Create fill in the blank question
     */
    public function fillBlank(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'fill_blank',
            'question_text' => $this->faker->randomElement([
                'The primary function of _____ is to manage data flow.',
                'In programming, _____ is used to repeat code blocks.',
                'The _____ method is most efficient for this operation.',
                'To solve this problem, we need to use _____.',
                'The concept of _____ is fundamental in this field.'
            ]),
        ]);
    }

    /**
     * Create question for specific section
     */
    public function forSection(Section $section): static
    {
        return $this->state(fn (array $attributes) => [
            'section_id' => $section->id,
        ]);
    }

    /**
     * Create question with audio
     */
    public function withAudio(): static
    {
        return $this->state(fn (array $attributes) => [
            'audio_url' => $this->faker->randomElement([
                'https://example.com/audio/question1.mp3',
                'https://example.com/audio/question2.wav',
                'https://example.com/audio/question3.m4a',
                '/storage/audio/quiz_audio_' . $this->faker->numberBetween(1, 100) . '.mp3'
            ]),
        ]);
    }

    /**
     * Create question without audio
     */
    public function withoutAudio(): static
    {
        return $this->state(fn (array $attributes) => [
            'audio_url' => null,
        ]);
    }

    /**
     * Create programming question
     */
    public function programming(): static
    {
        return $this->state(fn (array $attributes) => [
            'question_text' => $this->faker->randomElement([
                'What is the output of the following code snippet?',
                'Which PHP function is used to connect to a database?',
                'What is the correct syntax for a for loop in JavaScript?',
                'How do you declare a variable in Python?',
                'What is the purpose of the MVC pattern?',
                'Which method is used to add elements to an array?',
                'What is the difference between == and === in PHP?',
                'How do you handle exceptions in Laravel?'
            ]),
            'explanation' => 'This question tests understanding of programming concepts and syntax.',
        ]);
    }

    /**
     * Create math question
     */
    public function mathematics(): static
    {
        return $this->state(fn (array $attributes) => [
            'question_text' => $this->faker->randomElement([
                'What is the value of x in the equation 2x + 5 = 15?',
                'Calculate the area of a circle with radius 7 cm.',
                'What is the derivative of x² + 3x + 2?',
                'Solve for y: 3y - 8 = 2y + 4',
                'What is the sum of angles in a triangle?',
                'Calculate the probability of rolling a 6 on a dice.',
                'What is the slope of the line y = 2x + 3?',
                'Find the value of sin(90°).'
            ]),
            'explanation' => 'This question assesses mathematical problem-solving skills.',
        ]);
    }

    /**
     * Create science question
     */
    public function science(): static
    {
        return $this->state(fn (array $attributes) => [
            'question_text' => $this->faker->randomElement([
                'What is the chemical formula for water?',
                'Which planet is closest to the Sun?',
                'What is the powerhouse of the cell?',
                'What gas do plants absorb during photosynthesis?',
                'What is the speed of light in vacuum?',
                'Which element has the atomic number 1?',
                'What is the basic unit of heredity?',
                'What force keeps planets in orbit around the Sun?'
            ]),
            'explanation' => 'This question tests knowledge of scientific facts and principles.',
        ]);
    }

    /**
     * Create question with detailed explanation
     */
    public function withDetailedExplanation(): static
    {
        return $this->state(fn (array $attributes) => [
            'explanation' => $this->faker->paragraphs(3, true) . 
                           "\n\nKey points to remember:\n" .
                           "• " . $this->faker->sentence() . "\n" .
                           "• " . $this->faker->sentence() . "\n" .
                           "• " . $this->faker->sentence(),
        ]);
    }

    /**
     * Create question with minimal explanation
     */
    public function withMinimalExplanation(): static
    {
        return $this->state(fn (array $attributes) => [
            'explanation' => $this->faker->sentence(),
        ]);
    }
}