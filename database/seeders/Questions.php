<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Questions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('questions')->insert([
            [
                'id' => 1,
                'question_group_id' => 1,
                'type' => 'multiple_choice',
                'question_text' => 'What is the main idea of the passage?',
                'foto_url' => null,
                'audio_url' => null,
                'explanation' => 'Teks membahas bagaimana AI membantu terapi, tetapi juga mengandung kekhawatiran terkait emosi dan etika.',
                'created_at' => '2025-08-04 09:29:46',
                'updated_at' => '2025-08-04 09:35:12',
            ],
            [
                'id' => 2,
                'question_group_id' => 1,
                'type' => 'multiple_choice',
                'question_text' => 'According to the passage, why are AI chatbots helpful for people in remote areas?',
                'foto_url' => null,
                'audio_url' => null,
                'explanation' => 'Paragraf pertama menyebutkan bahwa chatbot memberi dukungan emosional bagi yang tidak bisa mengakses terapi.',
                'created_at' => '2025-08-04 09:30:52',
                'updated_at' => '2025-08-04 09:30:52',
            ],
            [
                'id' => 3,
                'question_group_id' => 1,
                'type' => 'multiple_choice',
                'question_text' => 'The word "imitates" in paragraph 2 is closest in meaning to...',
                'foto_url' => null,
                'audio_url' => null,
                'explanation' => 'Dr. Sara Quinn menyebut AI hanya "imitates conversation", artinya meniru atau menyalin cara manusia bicara.',
                'created_at' => '2025-08-04 09:31:46',
                'updated_at' => '2025-08-04 09:31:46',
            ],
            [
                'id' => 4,
                'question_group_id' => 1,
                'type' => 'multiple_choice',
                'question_text' => "What can be inferred about Dr. Sara Quinn's opinion on AI therapy?",
                'foto_url' => null,
                'audio_url' => null,
                'explanation' => 'Ia menyatakan AI tidak bisa mengenali kebutuhan emosional dalam-dalam.',
                'created_at' => '2025-08-04 09:33:10',
                'updated_at' => '2025-08-04 09:33:10',
            ],
            [
                'id' => 5,
                'question_group_id' => 1,
                'type' => 'multiple_choice',
                'question_text' => 'Why did the author write this passage?',
                'foto_url' => null,
                'audio_url' => null,
                'explanation' => 'Penulis membahas dua sisi dari penggunaan AI dalam terapi.',
                'created_at' => '2025-08-04 09:34:17',
                'updated_at' => '2025-08-04 09:34:17',
            ],
        ]);
    }
}
