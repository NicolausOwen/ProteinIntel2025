<?php

namespace Database\Factories;

use App\Models\QuestionGroup;
use App\Models\Section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\QuestionGroup>
 */
class QuestionGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = QuestionGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'section_id' => Section::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(3, true), // Judul singkat 3 kata
            'type' => $this->faker->randomElement([
                'audio',
                'text',
                'image',
            ]),
            'shared_content' => $this->faker->optional(0.7)->paragraphs(
                $this->faker->numberBetween(1, 3), 
                true
            ), // 70% chance ada shared content
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    /**
     * State untuk question group dengan tipe multiple choice
     */
    public function multipleChoice(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'multiple',
            'title' => 'Multiple Choice Questions',
        ]);
    }

    /**
     * State untuk question group dengan tipe essay
     */
    public function essay(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'essay',
            'title' => 'Essay Questions',
            'shared_content' => $this->faker->paragraphs(2, true),
        ]);
    }

    /**
     * State untuk question group dengan tipe true/false
     */
    public function trueFalse(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'truefalse',
            'title' => 'True/False Questions',
        ]);
    }

    /**
     * State untuk question group tanpa shared content
     */
    public function withoutSharedContent(): static
    {
        return $this->state(fn (array $attributes) => [
            'shared_content' => null,
        ]);
    }

    /**
     * State untuk question group dengan shared content panjang
     */
    public function withLongSharedContent(): static
    {
        return $this->state(fn (array $attributes) => [
            'shared_content' => $this->faker->paragraphs(5, true),
        ]);
    }

    /**
     * State untuk question group dengan section tertentu
     */
    public function forSection(Section $section): static
    {
        return $this->state(fn (array $attributes) => [
            'section_id' => $section->id,
        ]);
    }

    /**
     * State untuk question group reading comprehension
     */
    public function readingComprehension(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'multiple',
            'title' => 'Reading Comprehension',
            'shared_content' => $this->faker->paragraphs(4, true) . "\n\n" . 
                              "Please read the passage above and answer the following questions.",
        ]);
    }

    /**
     * State untuk question group listening
     */
    public function listening(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'multiple',
            'title' => 'Listening Section',
            'shared_content' => 'Listen to the audio and answer the questions below.',
        ]);
    }
}