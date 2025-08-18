<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Question;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Section;
use App\Models\QuestionGroup;
use Database\Seeders\RoleSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // First
        $this->call([
            RoleSeeder::class,
        ]);

        $adminUser = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $adminUser->assignRole('admin');

        // Second
        $this->call([
            QuizSeeder::class,
            QuestionGroupSeeder::class,
            Questions::class,
            OptionsSeeder::class,
            ListeningSectionSeeder::class,
            StructureSectionSeeder::class
        ]);

        // Quiz::factory(10)->create();
        // Section::factory(10)->create();
        // QuestionGroup::factory(10)->create();
        // Question::factory(10)->create();
        // Option::factory(10)->create();

        // QuestionGroup::factory()
        //     ->count(3)
        //     ->essay()
        //     ->withLongSharedContent()
        //     ->create();

    }
}
