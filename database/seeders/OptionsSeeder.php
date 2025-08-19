<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk menghindari duplikat
        DB::table('options')->delete();

        $now = Carbon::now();

        DB::table('options')->insert([
            // --- Soal 1 ---
            ['question_id' => 1, 'option_text' => 'AI therapy is dangerous and should be avoided.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 1, 'option_text' => 'AI chatbots can fully replace human therapists.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 1, 'option_text' => 'AI therapy offers emotional support but also raises concerns.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 1, 'option_text' => "People prefer AI because it's more empathetic than humans.", 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 2 ---
            ['question_id' => 2, 'option_text' => 'They can deliver medicine through drones.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 2, 'option_text' => 'They provide cheap and accessible emotional support.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 2, 'option_text' => 'They can diagnose medical conditions.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 2, 'option_text' => 'They act as doctors during emergencies.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 3 ---
            ['question_id' => 3, 'option_text' => 'Understands', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 3, 'option_text' => 'Copies', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 3, 'option_text' => 'Improves', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 3, 'option_text' => 'Feels', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 4 ---
            ['question_id' => 4, 'option_text' => 'She fully supports AI as the future of therapy.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 4, 'option_text' => 'She believes AI can read emotional signals accurately.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 4, 'option_text' => 'She doubts AI can understand true human emotion.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 4, 'option_text' => 'She uses AI in her own therapy sessions.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 5 ---
            ['question_id' => 5, 'option_text' => 'To criticize AI developers.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 5, 'option_text' => 'To explore the benefits and limitations of AI therapy.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 5, 'option_text' => 'To warn readers about digital privacy.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 5, 'option_text' => 'To encourage replacing all human therapists.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 6 ---
            ['question_id' => 6, 'option_text' => 'AI is banned in Japanese schools.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 6, 'option_text' => 'Students now prefer using AI tools over traditional classes.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 6, 'option_text' => 'Textbooks are still the most used learning tool.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 6, 'option_text' => 'Face-to-face learning is increasing in popularity.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 7 ---
            ['question_id' => 7, 'option_text' => 'Japanese', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 7, 'option_text' => 'Korean', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 7, 'option_text' => 'English', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 7, 'option_text' => 'Chinese', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 8 ---
            ['question_id' => 8, 'option_text' => 'They find AI more natural than teachers.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 8, 'option_text' => 'They are more satisfied than younger students.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 8, 'option_text' => 'They think AI lacks emotional connection.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 8, 'option_text' => 'They don’t study languages at all.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 9 ---
            ['question_id' => 9, 'option_text' => 'Peace', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 9, 'option_text' => 'Change', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 9, 'option_text' => 'Attack', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 9, 'option_text' => 'System', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 10 ---
            ['question_id' => 10, 'option_text' => 'Streaming platforms', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 10, 'option_text' => 'Flashcards', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 10, 'option_text' => 'Online lessons', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 10, 'option_text' => 'Textbooks', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 11 ---
            ['question_id' => 11, 'option_text' => 'To explain how fog harvesting works and its benefits', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 11, 'option_text' => 'To sell fog harvesting tools', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 11, 'option_text' => 'To describe the weather in Chile', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 11, 'option_text' => 'To compare fog and rain collection', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 12 ---
            ['question_id' => 12, 'option_text' => 'Water towers', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 12, 'option_text' => 'Plastic pipes', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 12, 'option_text' => 'Mesh screens', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 12, 'option_text' => 'Concrete walls', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 13 ---
            ['question_id' => 13, 'option_text' => 'It gets plenty of rain each year.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 13, 'option_text' => 'It is close to Santiago.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 13, 'option_text' => 'It has serious water scarcity issues.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 13, 'option_text' => 'It is famous for farming.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 14 ---
            ['question_id' => 14, 'option_text' => 'Weakness', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 14, 'option_text' => 'Flexibility', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 14, 'option_text' => 'Strength', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 14, 'option_text' => 'Fragility', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 15 ---
            ['question_id' => 15, 'option_text' => 'Santiago', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 15, 'option_text' => 'Patagonia', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 15, 'option_text' => 'Alto Hospicio', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 15, 'option_text' => 'Andes Mountains', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 16 ---
            ['question_id' => 16, 'option_text' => 'Arctic plants are dying rapidly.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 16, 'option_text' => 'Shrubs are becoming more dominant due to warming.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 16, 'option_text' => 'Drones are damaging the Arctic.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 16, 'option_text' => 'Arctic animals are thriving.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 17 ---
            ['question_id' => 17, 'option_text' => 'The process of plants dying.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 17, 'option_text' => 'Shrubs getting replaced by trees.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 17, 'option_text' => 'Shrubs growing taller and more common.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 17, 'option_text' => 'Arctic plants becoming extinct.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 18 ---
            ['question_id' => 18, 'option_text' => 'Destroy', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 18, 'option_text' => 'Watch', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 18, 'option_text' => 'Block', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 18, 'option_text' => 'Plant', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 19 ---
            ['question_id' => 19, 'option_text' => 'They welcome shrub growth.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 19, 'option_text' => 'Their traditions are unaffected.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 19, 'option_text' => 'Their lives are impacted due to caribou changes.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 19, 'option_text' => 'They use drones to track plants.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 20 ---
            ['question_id' => 20, 'option_text' => 'It poisons the water.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 20, 'option_text' => 'It increases ice levels.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 20, 'option_text' => 'It makes migration harder.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 20, 'option_text' => 'It causes more rain.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 21 ---
            ['question_id' => 21, 'option_text' => 'Man Saves Ship from Disaster', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 21, 'option_text' => 'The Day a Ship Visited a Backyard', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 21, 'option_text' => 'Norway Bans Cargo Ships', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 21, 'option_text' => 'Helberg’s Shipbuilding Business', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 22 ---
            ['question_id' => 22, 'option_text' => 'It destroyed the entire house.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 22, 'option_text' => 'It spilled oil into the sea.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 22, 'option_text' => 'It broke a wire to the heating pump.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 22, 'option_text' => 'It blocked a highway.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 23 ---
            ['question_id' => 23, 'option_text' => 'He was terrified and angry.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 23, 'option_text' => 'He wants to move away.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 23, 'option_text' => 'He saw the ship crash live.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 23, 'option_text' => 'He found it unforgettable and didn’t regret it.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 24 ---
            ['question_id' => 24, 'option_text' => 'Floating', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 24, 'option_text' => 'Crashed', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 24, 'option_text' => 'Sailed', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 24, 'option_text' => 'Fixed', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 25 ---
            ['question_id' => 25, 'option_text' => 'They caught multiple suspects.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 25, 'option_text' => 'The case is closed.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 25, 'option_text' => 'One suspect is being investigated.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 25, 'option_text' => 'The crew was arrested.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 26 ---
            ['question_id' => 26, 'option_text' => 'Parents should never buy baby food from Southeast Asia.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 26, 'option_text' => 'Added sugars are increasing health concerns in baby food.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 26, 'option_text' => 'Nestlé has solved the baby food sugar problem.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 26, 'option_text' => 'Obesity is no longer a problem for babies.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 27 ---
            ['question_id' => 27, 'option_text' => 'Labels are written in English only.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 27, 'option_text' => 'Labels do not include expiry dates.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 27, 'option_text' => 'Labels do not clearly show added vs. natural sugars.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 27, 'option_text' => 'Labels show too much iron content.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 28 ---
            ['question_id' => 28, 'option_text' => 'Increase', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 28, 'option_text' => 'Hide', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 28, 'option_text' => 'Improve', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 28, 'option_text' => 'Replace', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 29 ---
            ['question_id' => 29, 'option_text' => 'They prefer traditional homemade food.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 29, 'option_text' => 'They intentionally choose unhealthy products.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 29, 'option_text' => 'They trust labels and want healthy food for their babies.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 29, 'option_text' => 'They are unaware of sugar content and do not care.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 30 ---
            ['question_id' => 30, 'option_text' => 'Sugar should be increased for taste.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 30, 'option_text' => 'Parents should cook all baby food.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 30, 'option_text' => 'Added sugar should be reduced now.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 30, 'option_text' => 'Sugar labels should be removed.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 31 ---
            ['question_id' => 31, 'option_text' => 'To measure the health effects of sleeping patterns.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 31, 'option_text' => 'To find the happiest times and days in people’s lives.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 31, 'option_text' => 'To compare sleeping hours between genders.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 31, 'option_text' => 'To promote Sunday activities.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 32 ---
            ['question_id' => 32, 'option_text' => 'Because it is the first workday.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 32, 'option_text' => 'Because people shop more on Sundays.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 32, 'option_text' => 'Because people are still tired from Friday.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 32, 'option_text' => 'Because people had time to relax on Saturday.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 33 ---
            ['question_id' => 33, 'option_text' => 'Increased', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 33, 'option_text' => 'Reduced', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 33, 'option_text' => 'Ignored', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 33, 'option_text' => 'Encouraged', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 34 ---
            ['question_id' => 34, 'option_text' => 'It is when people are most energetic.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 34, 'option_text' => 'It is when people are most productive.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 34, 'option_text' => 'It is associated with lower mood levels.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 34, 'option_text' => 'It is linked to high life satisfaction.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 35 ---
            ['question_id' => 35, 'option_text' => 'Weather conditions', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 35, 'option_text' => 'Weekly social activities', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 35, 'option_text' => 'Sociocultural cycles', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 35, 'option_text' => 'Personal diet', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 36 ---
            ['question_id' => 36, 'option_text' => 'Dental hygiene is expensive and unnecessary.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 36, 'option_text' => 'Brushing is better than flossing.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 36, 'option_text' => 'Flossing may help prevent strokes.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 36, 'option_text' => 'Oral hygiene has nothing to do with the brain.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 37 ---
            ['question_id' => 37, 'option_text' => 'Once every two weeks', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 37, 'option_text' => 'Every day before sleeping', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 37, 'option_text' => 'After every meal', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 37, 'option_text' => 'At least once a week', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 38 ---
            ['question_id' => 38, 'option_text' => 'Expensive', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 38, 'option_text' => 'Complicated', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 38, 'option_text' => 'Low-cost', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 38, 'option_text' => 'Rare', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 39 ---
            ['question_id' => 39, 'option_text' => 'People prefer going to the dentist than flossing.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 39, 'option_text' => 'People who floss their teeth once a week have lower stroke risks.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 39, 'option_text' => 'Everyone flosses daily.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 39, 'option_text' => 'Flossing is not popular in developed countries.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 40 ---
            ['question_id' => 40, 'option_text' => 'It reduces cholesterol.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 40, 'option_text' => 'It lowers brain pressure.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 40, 'option_text' => 'It reduces oral infections.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 40, 'option_text' => 'It strengthens blood vessels.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 41 ---
            ['question_id' => 41, 'option_text' => 'Abbreviations are more fun to use.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 41, 'option_text' => 'People respond faster to text abbreviations.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 41, 'option_text' => 'Abbreviations make messages feel less sincere.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 41, 'option_text' => 'People cannot understand abbreviations.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 42 ---
            ['question_id' => 42, 'option_text' => 'They found them more meaningful.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 42, 'option_text' => 'They found them impolite and careless.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 42, 'option_text' => 'They found them easier to read.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 42, 'option_text' => 'They replied more often.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 43 ---
            ['question_id' => 43, 'option_text' => 'Misspelled', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 43, 'option_text' => 'Long-form', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 43, 'option_text' => 'Shortened', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 43, 'option_text' => 'Emphasized', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 44 ---
            ['question_id' => 44, 'option_text' => 'They expected abbreviations to seem cold.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 44, 'option_text' => 'They were surprised by the negative results.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 44, 'option_text' => 'They disliked abbreviations.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 44, 'option_text' => 'They avoided texting entirely.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 45 ---
            ['question_id' => 45, 'option_text' => 'FYI', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 45, 'option_text' => 'IMHO', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 45, 'option_text' => 'LOL', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 45, 'option_text' => 'CUL8R', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 46 ---
            ['question_id' => 46, 'option_text' => 'The USA is under drone attack.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 46, 'option_text' => 'Mysterious drone sightings have caused concern and confusion.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 46, 'option_text' => 'All drones belong to Iran.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 46, 'option_text' => 'The drones are used for delivery.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 47 ---
            ['question_id' => 47, 'option_text' => 'They are delivering packages without permission.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 47, 'option_text' => 'They make too much noise at night.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 47, 'option_text' => 'They have flown over military bases.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 47, 'option_text' => 'They have attacked public areas.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 48 ---
            ['question_id' => 48, 'option_text' => 'News reports', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 48, 'option_text' => 'Scientific discoveries', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 48, 'option_text' => 'Secret plans or plots', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 48, 'option_text' => 'True statements', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 49 ---
            ['question_id' => 49, 'option_text' => 'They are confirmed to be from foreign governments.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 49, 'option_text' => 'Most sightings might be misinterpretations.', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 49, 'option_text' => 'The drones have attacked U.S. citizens.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 49, 'option_text' => 'All sightings have been proven.', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            // --- Soal 50 ---
            ['question_id' => 50, 'option_text' => 'Homeland Security', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 50, 'option_text' => 'FBI', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 50, 'option_text' => 'NASA', 'is_correct' => true, 'created_at' => $now, 'updated_at' => $now],
            ['question_id' => 50, 'option_text' => 'ABC News', 'is_correct' => false, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
