<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Questions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hapus data lama untuk menghindari duplikat ID
        DB::table('questions')->delete();

        $now = Carbon::now();

        DB::table('questions')->insert([
            // --- Passage 1 ---
            ['id' => 1, 'question_group_id' => 1, 'type' => 'multiple_choice', 'question_text' => 'What is the main idea of the passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Teks membahas bagaimana AI membantu terapi, tetapi juga mengandung kekhawatiran terkait emosi dan etika.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'question_group_id' => 1, 'type' => 'multiple_choice', 'question_text' => 'According to the passage, why are AI chatbots helpful for people in remote areas?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Paragraf pertama menyebutkan bahwa chatbot memberi dukungan emosional bagi yang tidak bisa mengakses terapi.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'question_group_id' => 1, 'type' => 'multiple_choice', 'question_text' => 'The word "imitates" in paragraph 2 is closest in meaning to...', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Dr. Sara Quinn menyebut AI hanya "imitates conversation", artinya meniru atau menyalin cara manusia bicara.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'question_group_id' => 1, 'type' => 'multiple_choice', 'question_text' => "What can be inferred about Dr. Sara Quinn's opinion on AI therapy?", 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Ia menyatakan AI tidak bisa mengenali kebutuhan emosional dalam-dalam.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'question_group_id' => 1, 'type' => 'multiple_choice', 'question_text' => 'Why did the author write this passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Penulis membahas dua sisi dari penggunaan AI dalam terapi.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 2 ---
            ['id' => 6, 'question_group_id' => 2, 'type' => 'multiple_choice', 'question_text' => 'What is the main idea of the passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Teks membandingkan AI dan metode lain, dengan AI makin banyak digunakan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'question_group_id' => 2, 'type' => 'multiple_choice', 'question_text' => 'According to the passage, what is the most studied language in Japan?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Disebutkan bahwa English adalah bahasa yang paling banyak dipelajari.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'question_group_id' => 2, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about older students’ opinions on AI learning?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Disebut bahwa beberapa orang di usia 20-an merasa AI tidak cukup alami dan membosankan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'question_group_id' => 2, 'type' => 'multiple_choice', 'question_text' => 'The word “revolution” in the second paragraph is closest in meaning to...', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Kalimat “AI revolution” menunjukkan adanya perubahan besar dalam cara belajar.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'question_group_id' => 2, 'type' => 'multiple_choice', 'question_text' => 'Which of the following is NOT mentioned as a language-learning method?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Flashcards tidak disebutkan dalam daftar metode belajar di paragraf kedua.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 3 ---
            ['id' => 11, 'question_group_id' => 3, 'type' => 'multiple_choice', 'question_text' => 'What is the main purpose of the passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Fokus teks adalah menjelaskan bagaimana teknologi ini bisa digunakan di daerah kering.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 12, 'question_group_id' => 3, 'type' => 'multiple_choice', 'question_text' => 'According to the passage, what is used to capture fog water?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Air ditangkap menggunakan jaring (mesh) lalu menetes ke pipa.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 13, 'question_group_id' => 3, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about Alto Hospicio?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Disebut curah hujannya <5 mm, artinya sangat kering.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 14, 'question_group_id' => 3, 'type' => 'multiple_choice', 'question_text' => 'The word “resilience” in the last paragraph is closest in meaning to...', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Resilience berarti kemampuan untuk pulih atau bertahan dari kesulitan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 15, 'question_group_id' => 3, 'type' => 'multiple_choice', 'question_text' => 'Where was the fog harvesting project tested?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Langsung disebutkan bahwa proyek diuji di kota Alto Hospicio.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 4 ---
            ['id' => 16, 'question_group_id' => 4, 'type' => 'multiple_choice', 'question_text' => 'What is the main idea of the passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Fokus utama adalah perubahan tanaman akibat pemanasan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 17, 'question_group_id' => 4, 'type' => 'multiple_choice', 'question_text' => 'According to the passage, what is “shrubification”?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Dijelaskan bahwa “shrubification” adalah meningkatnya pertumbuhan semak.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 18, 'question_group_id' => 4, 'type' => 'multiple_choice', 'question_text' => 'What does the word “monitor” in paragraph 2 most likely mean?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Drones digunakan untuk “monitoring changes”, artinya memantau.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 19, 'question_group_id' => 4, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about the impact on Indigenous communities?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Disebut caribou penting secara budaya dan ekonomi bagi mereka.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 20, 'question_group_id' => 4, 'type' => 'multiple_choice', 'question_text' => 'According to the passage, why is shrubification a problem for caribou?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Disebut bahwa semak membuat caribou sulit bermigrasi dan menghindari predator.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 5 ---
            ['id' => 21, 'question_group_id' => 5, 'type' => 'multiple_choice', 'question_text' => 'What is the best title for this passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Teks fokus pada kejadian unik kapal yang nyasar dekat rumah seseorang.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 22, 'question_group_id' => 5, 'type' => 'multiple_choice', 'question_text' => 'According to the passage, what damage was caused by the ship?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Hanya satu kerusakan disebutkan: kabel pemanas.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 23, 'question_group_id' => 5, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about Johan Helberg’s reaction to the event?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Ia mengatakan kejadian itu "unforgettable" dan tak akan menukarnya dengan apapun.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 24, 'question_group_id' => 5, 'type' => 'multiple_choice', 'question_text' => 'The word “grounded” in the first paragraph is closest in meaning to...', 'foto_url' => null, 'audio_url' => null, 'explanation' => '“Run aground” berarti kandas atau tersangkut di daratan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 25, 'question_group_id' => 5, 'type' => 'multiple_choice', 'question_text' => 'According to the passage, what did the police say about the incident?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Disebut bahwa polisi masih menyelidiki dan ada satu tersangka.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 6 ---
            ['id' => 26, 'question_group_id' => 6, 'type' => 'multiple_choice', 'question_text' => 'What is the main idea of the passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Teks ini membahas kekhawatiran terhadap kandungan gula tambahan dalam makanan bayi di Asia Tenggara.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 27, 'question_group_id' => 6, 'type' => 'multiple_choice', 'question_text' => 'What is the concern about labeling in baby foods?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Masalahnya adalah label tidak membedakan antara gula alami dan gula tambahan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 28, 'question_group_id' => 6, 'type' => 'multiple_choice', 'question_text' => 'What does the word “mask” mean in the sentence: “Nestlé says it adds sugar to mask the taste of nutrients…”?', 'foto_url' => null, 'audio_url' => null, 'explanation' => '"Mask" berarti menyembunyikan rasa zat besi dan DHA.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 29, 'question_group_id' => 6, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about parents in Southeast Asia?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Orang tua ingin memberikan yang terbaik untuk anak-anak mereka, tapi sering tertipu karena label yang menyesatkan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 30, 'question_group_id' => 6, 'type' => 'multiple_choice', 'question_text' => 'According to the WHO, what should be done?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'WHO menyarankan pengurangan gula tambahan segera, terutama untuk anak-anak di bawah usia tiga tahun.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 7 ---
            ['id' => 31, 'question_group_id' => 7, 'type' => 'multiple_choice', 'question_text' => 'What is the main purpose of the study mentioned?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Teks ini menjelaskan bagaimana waktu dalam sehari dan seminggu mempengaruhi suasana hati kita.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 32, 'question_group_id' => 7, 'type' => 'multiple_choice', 'question_text' => 'According to the researchers, why might people feel better on Sunday mornings?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Paragraf 2 menjelaskan bahwa orang merasa lebih baik karena mereka mungkin bersantai pada hari Sabtu.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 33, 'question_group_id' => 7, 'type' => 'multiple_choice', 'question_text' => 'The word “subdued” in “feelings of anxiety are more subdued” means…', 'foto_url' => null, 'audio_url' => null, 'explanation' => '“subdued” di sini berarti mengendalikan atau mengurangi perasaan cemas.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 34, 'question_group_id' => 7, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about midnight?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Paragraf 1 menyatakan bahwa tengah malam memiliki hubungan yang paling buruk dengan kesehatan mental.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 35, 'question_group_id' => 7, 'type' => 'multiple_choice', 'question_text' => 'Which of the following is NOT mentioned as a possible influence on mood?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Teks menyebutkan pengaruh cuaca, musim, dan siklus sosio-budaya.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 8 ---
            ['id' => 36, 'question_group_id' => 8, 'type' => 'multiple_choice', 'question_text' => 'What is the main idea of the passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Teks ini berfokus pada temuan penelitian yang menunjukkan bahwa penggunaan benang gigi dapat membantu mencegah stroke.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 37, 'question_group_id' => 8, 'type' => 'multiple_choice', 'question_text' => 'How often should someone floss to benefit their health, according to the study?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Paragraf 2 menyatakan bahwa penggunaan benang gigi setidaknya sekali seminggu dapat mencegah risiko stroke.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 38, 'question_group_id' => 8, 'type' => 'multiple_choice', 'question_text' => 'The word “affordable” in “flossing is easy, affordable, and accessible” means…', 'foto_url' => null, 'audio_url' => null, 'explanation' => '“affordable” berarti terjangkau, murah, atau memiliki harga yang wajar.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 39, 'question_group_id' => 8, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about people’s dental care habits?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Penelitian menyatakan bahwa membersihkan gigi dengan benang gigi setidaknya seminggu sekali dapat mengurangi risiko stroke.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 40, 'question_group_id' => 8, 'type' => 'multiple_choice', 'question_text' => 'According to Dr. Sen, why is flossing helpful in preventing strokes?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Pada paragraf 2, menurut penelitian Dr. Sen, penggunaan benang gigi mengurangi infeksi mulut.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 9 ---
            ['id' => 41, 'question_group_id' => 9, 'type' => 'multiple_choice', 'question_text' => 'What is the main finding of the research?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Fokus utama teks adalah pada dampak singkatan dalam texting, menemukan bahwa singkatan menandakan upaya yang lebih rendah oleh pengirim.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 42, 'question_group_id' => 9, 'type' => 'multiple_choice', 'question_text' => 'According to the study, how did people feel about abbreviated messages?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Studi tersebut mengatakan bahwa orang menganggap singkatan sebagai sesuatu yang tidak tulus atau kasar.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 43, 'question_group_id' => 9, 'type' => 'multiple_choice', 'question_text' => 'The word “truncated” most likely means…', 'foto_url' => null, 'audio_url' => null, 'explanation' => '“truncated” berarti dipersingkat atau dibikin pendek.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 44, 'question_group_id' => 9, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about the researchers’ expectations?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Dalam paragraf 2 di akhir teks, para peneliti mengatakan mereka mengharapkan singkatan menyampaikan rasa kedekatan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 45, 'question_group_id' => 9, 'type' => 'multiple_choice', 'question_text' => 'Which of the following is NOT listed as a common abbreviation?', 'foto_url' => null, 'audio_url' => null, 'explanation' => '"LOL" tidak disebutkan dalam teks ini.', 'created_at' => $now, 'updated_at' => $now],

            // --- Passage 10 ---
            ['id' => 46, 'question_group_id' => 10, 'type' => 'multiple_choice', 'question_text' => 'What is the main idea of the passage?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Teks tersebut berfokus pada penampakan drone yang aneh dan bagaimana hal itu menimbulkan kekhawatiran dan kebingungan.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 47, 'question_group_id' => 10, 'type' => 'multiple_choice', 'question_text' => 'What concerns residents in New Jersey about the drones?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Warga khawatir karena drone itu terbang di atas wilayah pemerintahan, seperti pangkalan militer.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 48, 'question_group_id' => 10, 'type' => 'multiple_choice', 'question_text' => 'The word “conspiracy” in the phrase “conspiracy theories” means…', 'foto_url' => null, 'audio_url' => null, 'explanation' => '"conspiracy" berarti konspirasi atau rencana rahasia yang dibuat oleh pihak tertentu.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 49, 'question_group_id' => 10, 'type' => 'multiple_choice', 'question_text' => 'What can be inferred about the drone sightings?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'Paragraf 2 memuat pernyataan pejabat AS, yang menyatakan bahwa penampakan drone tidak ada hubungannya dengan keterlibatan asing.', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 50, 'question_group_id' => 10, 'type' => 'multiple_choice', 'question_text' => 'Which of the following is NOT a source mentioned in the article?', 'foto_url' => null, 'audio_url' => null, 'explanation' => 'NASA tidak disebutkan dalam artikel ini.', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}