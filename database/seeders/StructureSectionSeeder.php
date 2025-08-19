<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestionGroup;
use App\Models\Question;
use App\Models\Option;
use Carbon\Carbon;

class StructureSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat satu Question Group untuk Structure Section
        $structureGroup = QuestionGroup::updateOrCreate(
            ['section_id' => 3, 'title' => 'Structure and Written Expression'],
            ['type' => 'text', 'shared_content' => null]
        );

        // Hapus soal dan opsi lama yang terkait dengan grup ini untuk menghindari duplikat
        $existingQuestionIds = Question::where('question_group_id', $structureGroup->id)->pluck('id');
        Option::whereIn('question_id', $existingQuestionIds)->delete();
        Question::where('question_group_id', $structureGroup->id)->delete();

        // Data untuk 40 soal
        $questionsData = [
            // --- SOAL 1-25 (Multiple Choice - Text Only) ---
            [
                'question_text' => 'The student had reread his answers thoroughly before he … his exam paper.',
                'explanation' => 'Karena kalimat pertama menggunakan past perfect (had reread), maka tindakan berikutnya pakai simple past (submitted).',
                'options' => [
                    ['text' => 'Submit', 'is_correct' => false],
                    ['text' => 'Submits', 'is_correct' => false],
                    ['text' => 'Submitted', 'is_correct' => true],
                    ['text' => 'Had submitted', 'is_correct' => false],
                ],
            ],
            // ... (soal 2-25 tetap sama seperti sebelumnya) ...
            [
                'question_text' => 'The new grocery store in town offers a wide … of goods.',
                'explanation' => 'Frasa yang benar adalah "a wide variety of goods".',
                'options' => [
                    ['text' => 'Varietal', 'is_correct' => false],
                    ['text' => 'Variety', 'is_correct' => true],
                    ['text' => 'variation', 'is_correct' => false],
                    ['text' => 'various', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'The primary source of energy for tropical cyclones is the latent heat released when ….',
                'explanation' => 'Bentuk yang benar adalah "when water vapor condenses”.',
                'options' => [
                    ['text' => 'condensed water vapor', 'is_correct' => false],
                    ['text' => 'does water vapor condense', 'is_correct' => false],
                    ['text' => 'the condensation of water vapor', 'is_correct' => false],
                    ['text' => 'water vapor condenses', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'If he … earlier, he would have caught the train.',
                'explanation' => 'Bentuk past perfect (had arrived) digunakan untuk conditional type 3.',
                'options' => [
                    ['text' => 'Arrives', 'is_correct' => false],
                    ['text' => 'Arrived', 'is_correct' => false],
                    ['text' => 'had arrived', 'is_correct' => true],
                    ['text' => 'was arriving', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Neither the manager nor the employees … present at the briefing.',
                'explanation' => 'Subjek terdekat "employees" (jamak), maka verb-nya "were".',
                'options' => [
                    ['text' => 'Was', 'is_correct' => false],
                    ['text' => 'Were', 'is_correct' => true],
                    ['text' => 'has been', 'is_correct' => false],
                    ['text' => 'Is', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'The teacher demanded that the essay … by Friday.',
                'explanation' => 'Kata kerja "demand" diikuti subjunctive verb "be + past participle".',
                'options' => [
                    ['text' => 'be submitted', 'is_correct' => true],
                    ['text' => 'is submitted', 'is_correct' => false],
                    ['text' => 'was submitted', 'is_correct' => false],
                    ['text' => 'Submitted', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'I don’t know where she is; she … the office without saying anything.',
                'explanation' => '"Must have + V3" digunakan untuk dugaan logis di masa lalu.',
                'options' => [
                    ['text' => 'must leave', 'is_correct' => false],
                    ['text' => 'must have left', 'is_correct' => true],
                    ['text' => 'Leaves', 'is_correct' => false],
                    ['text' => 'has to leave', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'He was the only one of the candidates who … experience in marketing.',
                'explanation' => '"Who" merujuk pada "one" (tunggal), maka verb-nya "has".',
                'options' => [
                    ['text' => 'Have', 'is_correct' => false],
                    ['text' => 'Having', 'is_correct' => false],
                    ['text' => 'Has', 'is_correct' => true],
                    ['text' => 'had', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'The proposal was rejected … it was incomplete.',
                'explanation' => 'Menyatakan sebab akibat: ditolak karena tidak lengkap.',
                'options' => [
                    ['text' => 'Despite', 'is_correct' => false],
                    ['text' => 'Although', 'is_correct' => false],
                    ['text' => 'Because', 'is_correct' => true],
                    ['text' => 'Whereas', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Not only the children but also their teacher … excited for the trip.',
                'explanation' => 'Verb menyesuaikan subjek terdekat, yaitu "teacher" (tunggal).',
                'options' => [
                    ['text' => 'Are', 'is_correct' => false],
                    ['text' => 'Were', 'is_correct' => false],
                    ['text' => 'Is', 'is_correct' => true],
                    ['text' => 'be', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'We were surprised by how quickly he … the problem.',
                'explanation' => 'Aksi selesai di masa lalu, gunakan simple past: "solved".',
                'options' => [
                    ['text' => 'Solving', 'is_correct' => false],
                    ['text' => 'Solved', 'is_correct' => true],
                    ['text' => 'Solve', 'is_correct' => false],
                    ['text' => 'was solving', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'It is essential that every student … the form before the deadline.',
                'explanation' => 'Dalam bentuk subjunctive, setelah "essential that" → gunakan bentuk dasar: "complete".',
                'options' => [
                    ['text' => 'Complete', 'is_correct' => true],
                    ['text' => 'Completes', 'is_correct' => false],
                    ['text' => 'Completed', 'is_correct' => false],
                    ['text' => 'is completing', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Had they studied harder, they … the exam.',
                'explanation' => 'Conditional type 3: Had + V3, would have + V3.',
                'options' => [
                    ['text' => 'Were', 'is_correct' => false],
                    ['text' => 'Passed', 'is_correct' => false],
                    ['text' => 'would have passed', 'is_correct' => true],
                    ['text' => 'will pass', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'By the time we arrived, the show … already started.',
                'explanation' => '"By the time" → gunakan past perfect untuk kejadian yang sudah selesai lebih dulu.',
                'options' => [
                    ['text' => 'Has', 'is_correct' => false],
                    ['text' => 'Had', 'is_correct' => true],
                    ['text' => 'Have', 'is_correct' => false],
                    ['text' => 'Was', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Neither his friends nor his mother ____ aware of his condition.',
                'explanation' => 'Subjek terdekat “mother” tunggal → gunakan “is”.',
                'options' => [
                    ['text' => 'Is', 'is_correct' => true],
                    ['text' => 'Are', 'is_correct' => false],
                    ['text' => 'Was', 'is_correct' => false],
                    ['text' => 'were', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => '_____ students studying in a foreign country are provided with information about literacy practices and academic culture of that country, they will feel stranded in that academic environment.',
                'explanation' => 'Unless (kata hubung syarat negatif) berarti kecuali jika.',
                'options' => [
                    ['text' => 'unless', 'is_correct' => true],
                    ['text' => 'in order that', 'is_correct' => false],
                    ['text' => 'as soon as', 'is_correct' => false],
                    ['text' => 'Where', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Maria looked very angry when she got into her room. A few hours later, she told me that she ____ some materials on the internet but she could not find anything.',
                'explanation' => 'Past perfect continuous tense (had been searching) menunjukkan aksi berlangsung sebelum kejadian lampau lain.',
                'options' => [
                    ['text' => 'was searching', 'is_correct' => false],
                    ['text' => 'Searches', 'is_correct' => false],
                    ['text' => 'had searching', 'is_correct' => false],
                    ['text' => 'had been searching', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'The girl _____ father is a vice president has been the most famous girl in my campus',
                'explanation' => 'Relative pronoun "whose" digunakan untuk menyatakan kepemilikan.',
                'options' => [
                    ['text' => 'who is', 'is_correct' => false],
                    ['text' => 'which is', 'is_correct' => false],
                    ['text' => 'Whose', 'is_correct' => true],
                    ['text' => 'whom is', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Dani was extremely tired when he arrived, because he ____ for his flight for three hours.',
                'explanation' => 'Past perfect continuous tense (had been waiting) fokus pada durasi aksi.',
                'options' => [
                    ['text' => 'Waited', 'is_correct' => false],
                    ['text' => 'was waiting', 'is_correct' => false],
                    ['text' => 'had waited', 'is_correct' => false],
                    ['text' => 'had been waiting', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'In cases where schizophrenia developed, the parents were often _____ responsible and were faulty parenting.',
                'explanation' => 'Bentuk pasif dalam past tense: "were considered".',
                'options' => [
                    ['text' => 'Considered', 'is_correct' => true],
                    ['text' => 'is considered', 'is_correct' => false],
                    ['text' => 'Considers', 'is_correct' => false],
                    ['text' => 'Considering', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'These results are a major step forward in understanding and _______ the formation of planet systems across the universe.',
                'explanation' => 'Bentuk gerund "explaining" sejajar dengan "understanding".',
                'options' => [
                    ['text' => 'Explain', 'is_correct' => false],
                    ['text' => 'Explaining', 'is_correct' => true],
                    ['text' => 'Explains', 'is_correct' => false],
                    ['text' => 'Explained', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'By the time we arrived at the station, the train ____.',
                'explanation' => 'Past Perfect Tense (had + V3) digunakan untuk kejadian yang terjadi lebih dulu di masa lampau.',
                'options' => [
                    ['text' => 'already left', 'is_correct' => false],
                    ['text' => 'had already left', 'is_correct' => true],
                    ['text' => 'has already left', 'is_correct' => false],
                    ['text' => 'is already leaving', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'I suggested that she ____ earlier to catch the train.',
                'explanation' => 'Bentuk dasar (base form) "leave" setelah "suggested that" dalam subjunctive mood.',
                'options' => [
                    ['text' => 'Leaves', 'is_correct' => false],
                    ['text' => 'Leaving', 'is_correct' => false],
                    ['text' => 'Leave', 'is_correct' => true],
                    ['text' => 'Left', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'The more you practice, ____ you become.',
                'explanation' => 'Pola comparative correlative: The more ..., the more .... .',
                'options' => [
                    ['text' => 'more fluent', 'is_correct' => false],
                    ['text' => 'the most fluent', 'is_correct' => false],
                    ['text' => 'the fluent', 'is_correct' => false],
                    ['text' => 'the more fluent', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'There are few people in this village ____ speak English fluently.',
                'explanation' => '"Who" digunakan untuk orang sebagai subjek dalam kalimat relatif.',
                'options' => [
                    ['text' => 'Who', 'is_correct' => true],
                    ['text' => 'Which', 'is_correct' => false],
                    ['text' => 'Whose', 'is_correct' => false],
                    ['text' => 'Whom', 'is_correct' => false],
                ],
            ],

            // --- SOAL 26-40 (Error Identification - Image Based) ---
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '26.png',
                'explanation' => 'Preposisi “upon crossing” kurang tepat; lebih tepat menggunakan “while crossing” karena simultanitas kejadian.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => true],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '27.png',
                'explanation' => 'Subjek utama adalah “The manager” (tunggal), bukan “assistants”. Seharusnya: is planning, bukan are planning.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => true],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '28.png',
                'explanation' => '"Every applicant" (tunggal) memerlukan kata kerja tunggal: "was notified".',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '29.png',
                'explanation' => '"Each" adalah subjek tunggal, jadi harusnya has received.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => true],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '30.png',
                'explanation' => '"Audience" (kata benda kolektif) dianggap tunggal dalam konteks ini, sehingga harus "was surprisingly unresponsive".',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => true],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '31.png',
                'explanation' => 'Subjek "series" (tunggal) memerlukan kata kerja tunggal. "Were" (jamak) harus diganti menjadi was.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => true],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '32.png',
                'explanation' => 'Frasa "by the time" memerlukan Past Perfect. "Has ended" harus diganti menjadi had ended.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => true],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '33.png',
                'explanation' => '"Committee" (kata benda kolektif) dianggap tunggal. "Are" harus diganti menjadi is.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => true],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '34.png',
                'explanation' => 'Seharusnya: laid (past tense dari lay) untuk arti "meletakkan".',
                'options' => [
                    ['text' => 'A', 'is_correct' => true],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '35.png',
                'explanation' => 'Klausa "who" merujuk ke "each student" (tunggal). "Participate" harus diganti menjadi participates.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => true],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '36.png',
                'explanation' => 'Subjek utama adalah "The committee members" (jamak), jadi seharusnya menggunakan "have expressed".',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '37.png',
                'explanation' => '“Each” adalah subjek tunggal, maka seharusnya: “has been”.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => true],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '38.png',
                'explanation' => '“Analyze” harus dalam bentuk past participle untuk kalimat passive → seharusnya: “analyzed”.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => true],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '39.png',
                'explanation' => '“Confidence” adalah noun, tapi yang dibutuhkan adalah adjective → seharusnya “confident”.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => false],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => true],
                ],
            ],
            [
                'question_text' => 'Choose the right answer',
                'foto_url' => '40.png',
                'explanation' => '“Efficient” adalah adjective, yang dibutuhkan adalah adverb → seharusnya: “efficiently”.',
                'options' => [
                    ['text' => 'A', 'is_correct' => false],
                    ['text' => 'B', 'is_correct' => true],
                    ['text' => 'C', 'is_correct' => false],
                    ['text' => 'D', 'is_correct' => false],
                ],
            ],
        ];

        // 3. Loop melalui data dan buat entri di database
        foreach ($questionsData as $questionData) {
            $question = Question::create([
                'question_group_id' => $structureGroup->id,
                'question_text' => $questionData['question_text'],
                'foto_url' => $questionData['foto_url'] ?? null, // Tambahkan ini
                'explanation' => $questionData['explanation'],
                'type' => 'multiple_choice',
            ]);

            foreach ($questionData['options'] as $optionData) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionData['text'],
                    'is_correct' => $optionData['is_correct'],
                ]);
            }
        }
    }
}