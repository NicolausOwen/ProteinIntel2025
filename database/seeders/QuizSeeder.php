<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Insert Quiz
        $quizId = DB::table('quizzes')->insertGetId([
            'title' => 'TOEFL Tryout 2025',
            'description' => 'Simulasi Tryout TOEFL resmi berbasis CBT',
            'duration_minutes' => 120,
            'created_by' => 1, // Ganti sesuai user ID admin

            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Insert Sections (Reading, Listening, Structure)
        DB::table('sections')->insert([
            [
                'quiz_id' => $quizId,
                'name' => 'Reading',
                'order' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'quiz_id' => $quizId,
                'name' => 'Listening',
                'order' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'quiz_id' => $quizId,
                'name' => 'Structure',
                'order' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
