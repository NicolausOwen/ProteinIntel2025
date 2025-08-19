<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuestionGroup;
use App\Models\Question;
use App\Models\Option;
use Carbon\Carbon;

class ListeningSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Buat satu Question Group untuk seluruh Listening Section
        $listeningGroup = QuestionGroup::create([
            'section_id' => 2,
            'title' => 'Listening Comprehension',
            'type' => 'audio',
            'shared_content' => null, // Audio per soal, bukan per grup
        ]);

        // 2. Data untuk 50 soal dan pilihan jawabannya
        $questionsData = [
            // Soal 1
            [
                'question_text' => 'Who did the woman meet on Monday?',
                'audio_url' => 'Listening_1.mp3',
                'explanation' => 'Pada hari Senin saat pesta wanita itu bertemu Beyonce.',
                'options' => [
                    ['text' => 'Benjamin', 'is_correct' => false],
                    ['text' => 'Lisa', 'is_correct' => false],
                    ['text' => 'Beyonce', 'is_correct' => true],
                    ['text' => 'Bruno', 'is_correct' => false],
                ],
            ],
            // Soal 2
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_2.mp3',
                'explanation' => 'Wanita itu tidak bisa ke perpustakaan bersama pria tersebut saat itu juga, karena harus mengerjakan PR kimia.',
                'options' => [
                    ['text' => 'She already finished her homework.', 'is_correct' => false],
                    ['text' => 'She can’t go to the library now.', 'is_correct' => true],
                    ['text' => 'She doesn\'t like chemistry.', 'is_correct' => false],
                    ['text' => 'She’s going to the library to study chemistry.', 'is_correct' => false],
                ],
            ],
            // Soal 3
            [
                'question_text' => 'What does the man suggest the woman do?',
                'audio_url' => 'Listening_3.mp3',
                'explanation' => 'Pria itu menyarankan wanita tersebut untuk mengecek di tas punggung milik wanita tersebut.',
                'options' => [
                    ['text' => 'Look in her backpack.', 'is_correct' => true],
                    ['text' => 'Ask someone for help.', 'is_correct' => false],
                    ['text' => 'Call someone to bring the keys.', 'is_correct' => false],
                    ['text' => 'Buy new keys.', 'is_correct' => false],
                ],
            ],
            // Soal 4
            [
                'question_text' => 'What does the woman suggest?',
                'audio_url' => 'Listening_4.mp3',
                'explanation' => 'Wanita itu menyarakankan untuk cek di meja dapur.',
                'options' => [
                    ['text' => 'Buying a new phone.', 'is_correct' => false],
                    ['text' => 'Calling the phone.', 'is_correct' => false],
                    ['text' => 'Looking in the kitchen.', 'is_correct' => true],
                    ['text' => 'Reporting it lost.', 'is_correct' => false],
                ],
            ],
            // Soal 5
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_5.mp3',
                'explanation' => 'Wanita itu selalu terlambat untuk bangun pagi.',
                'options' => [
                    ['text' => 'She doesn’t like morning class.', 'is_correct' => false],
                    ['text' => 'She doesn’t know when the class starts.', 'is_correct' => false],
                    ['text' => 'She wakes up late every morning.', 'is_correct' => true],
                    ['text' => 'She never attends the class.', 'is_correct' => false],
                ],
            ],
            // Soal 6
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_6.mp3',
                'explanation' => 'Wanita tersebut sudah melakukan yang terbaik.',
                'options' => [
                    ['text' => 'She’s doing the best she can.', 'is_correct' => true],
                    ['text' => 'It’s impossible for her to do anything.', 'is_correct' => false],
                    ['text' => 'There is a lot more that she can do.', 'is_correct' => false],
                    ['text' => 'She can try a little harder.', 'is_correct' => false],
                ],
            ],
            // Soal 7
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_7.mp3',
                'explanation' => 'Wanita itu hanya ingin memesan es krim.',
                'options' => [
                    ['text' => 'She wanted to order more food.', 'is_correct' => false],
                    ['text' => 'She was not hungry at all.', 'is_correct' => false],
                    ['text' => 'She only wanted ice cream.', 'is_correct' => true],
                    ['text' => 'She changed her order at the last minute.', 'is_correct' => false],
                ],
            ],
            // Soal 8
            [
                'question_text' => 'How does the woman feel?',
                'audio_url' => 'Listening_8.mp3',
                'explanation' => 'Wanita tersebut menyesal karena tidak mempersiapkan wawancaranya dengan matang.',
                'options' => [
                    ['text' => 'Confident', 'is_correct' => false],
                    ['text' => 'Regretful', 'is_correct' => true],
                    ['text' => 'Uninterested', 'is_correct' => false],
                    ['text' => 'Relieved', 'is_correct' => false],
                ],
            ],
            // Soal 9
            [
                'question_text' => 'What can be inferred about the man?',
                'audio_url' => 'Listening_9.mp3',
                'explanation' => 'Yang dapat disimpulkan dari perkataan pria tersebut adalah ia begadang karena mengerjakan makalahnya.',
                'options' => [
                    ['text' => 'He stayed up late studying.', 'is_correct' => true],
                    ['text' => 'He forgot to submit his paper.', 'is_correct' => false],
                    ['text' => 'He doesn’t care about his grades.', 'is_correct' => false],
                    ['text' => 'He took a long nap.', 'is_correct' => false],
                ],
            ],
            // Soal 10
            [
                'question_text' => 'Why is the man happy?',
                'audio_url' => 'Listening_10.mp3',
                'explanation' => 'Pria itu lulus ujian mengemudi.',
                'options' => [
                    ['text' => 'He bought a new car.', 'is_correct' => false],
                    ['text' => 'He learned how to drive.', 'is_correct' => false],
                    ['text' => 'He fixed his car.', 'is_correct' => false],
                    ['text' => 'He passed his driving exam.', 'is_correct' => true],
                ],
            ],
            // Soal 11
            [
                'question_text' => 'Where is the woman’s sister working now?',
                'audio_url' => 'Listening_11.mp3',
                'explanation' => 'Saudara wanita tersebut sudah pindah ke bank.',
                'options' => [
                    ['text' => 'At a bar', 'is_correct' => false],
                    ['text' => 'At a bookstore', 'is_correct' => false],
                    ['text' => 'At a bank', 'is_correct' => true],
                    ['text' => 'At a school', 'is_correct' => false],
                ],
            ],
            // Soal 12
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_12.mp3',
                'explanation' => 'Wanita tersebut sudah memiliki janji untuk meeting.',
                'options' => [
                    ['text' => 'She has plans and can’t go.', 'is_correct' => true],
                    ['text' => 'She already had lunch.', 'is_correct' => false],
                    ['text' => 'She doesn’t want to go with him.', 'is_correct' => false],
                    ['text' => 'She wants to eat later.', 'is_correct' => false],
                ],
            ],
            // Soal 13
            [
                'question_text' => 'Why did the woman miss the exam?',
                'audio_url' => 'Listening_13.mp3',
                'explanation' => 'Wanita itu sakit.',
                'options' => [
                    ['text' => 'She was late.', 'is_correct' => false],
                    ['text' => 'She forgot about it.', 'is_correct' => false],
                    ['text' => 'She was not ready for class.', 'is_correct' => false],
                    ['text' => 'She was sick.', 'is_correct' => true],
                ],
            ],
            // Soal 14
            [
                'question_text' => 'What does the woman prefer?',
                'audio_url' => 'Listening_14.mp3',
                'explanation' => 'Wanita itu memilih untuk berjalan kaki saja.',
                'options' => [
                    ['text' => 'Going home', 'is_correct' => false],
                    ['text' => 'Walking', 'is_correct' => true],
                    ['text' => 'Taking the bus', 'is_correct' => false],
                    ['text' => 'Waiting for a taxi', 'is_correct' => false],
                ],
            ],
            // Soal 15
            [
                'question_text' => 'How did the man feel about the concert?',
                'audio_url' => 'Listening_15.mp3',
                'explanation' => 'Pria itu sangat menyukai konser yang ia tonton.',
                'options' => [
                    ['text' => 'It was disappointing.', 'is_correct' => false],
                    ['text' => 'It was too loud.', 'is_correct' => false],
                    ['text' => 'He really liked it.', 'is_correct' => true],
                    ['text' => 'He didn’t enjoy it.', 'is_correct' => false],
                ],
            ],
            // Soal 16
            [
                'question_text' => 'What will the woman do?',
                'audio_url' => 'Listening_16.mp3',
                'explanation' => 'Wanita akan membantu Pria setelah mengirim mail.',
                'options' => [
                    ['text' => 'Help after sending the mail.', 'is_correct' => true],
                    ['text' => 'Ignore the man.', 'is_correct' => false],
                    ['text' => 'Move the boxes alone.', 'is_correct' => false],
                    ['text' => 'Send email for the man.', 'is_correct' => false],
                ],
            ],
            // Soal 17
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_17.mp3',
                'explanation' => 'Pria itu belum kesana, namun ia tertarik karena ia mendengar bahwa tempat itu bagus.',
                'options' => [
                    ['text' => 'He has been to the shop many times.', 'is_correct' => false],
                    ['text' => 'He doesn’t like coffee.', 'is_correct' => false],
                    ['text' => 'He wants to avoid the shop.', 'is_correct' => false],
                    ['text' => 'He hasn’t been there, but he’s interested.', 'is_correct' => true],
                ],
            ],
            // Soal 18
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_18.mp3',
                'explanation' => 'Wanita tersebut akan membayar makan siang mereka.',
                'options' => [
                    ['text' => 'She will lend him her wallet.', 'is_correct' => false],
                    ['text' => 'She will pay for his lunch.', 'is_correct' => true],
                    ['text' => 'She forgot her wallet too.', 'is_correct' => false],
                    ['text' => 'He should go home.', 'is_correct' => false],
                ],
            ],
            // Soal 19
            [
                'question_text' => 'What will the man probably do?',
                'audio_url' => 'Listening_19.mp3',
                'explanation' => 'Pria itu akan mengecek ke kursi belakang mobilnya.',
                'options' => [
                    ['text' => 'Call her phone.', 'is_correct' => false],
                    ['text' => 'Ignore her.', 'is_correct' => false],
                    ['text' => 'Look in his car.', 'is_correct' => true],
                    ['text' => 'Leave his car unlocked.', 'is_correct' => false],
                ],
            ],
            // Soal 20
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_20.mp3',
                'explanation' => 'Lisa dan Ana sama-sama tidak menyukai komedi tunggal, mereka memiliki pendapat yang sama.',
                'options' => [
                    ['text' => 'Only Lisa disliked the comedy show.', 'is_correct' => false],
                    ['text' => 'Lisa and Ana share the same opinion about stand-up comedy.', 'is_correct' => true],
                    ['text' => 'Ana tried to enjoy the show for Emma\'s sake.', 'is_correct' => false],
                    ['text' => 'Both Lisa and Ana enjoy stand-up comedy.', 'is_correct' => false],
                ],
            ],
            // Soal 21
            [
                'question_text' => 'What does the man agree to do?',
                'audio_url' => 'Listening_21.mp3',
                'explanation' => 'Pria itu akan meminjamkan catatan kuliah miliknya.',
                'options' => [
                    ['text' => 'Help her study.', 'is_correct' => false],
                    ['text' => 'Lend her his notes.', 'is_correct' => true],
                    ['text' => 'Give her the answer.', 'is_correct' => false],
                    ['text' => 'Go to class with her.', 'is_correct' => false],
                ],
            ],
            // Soal 22
            [
                'question_text' => 'How did the man feel about his presentation?',
                'audio_url' => 'Listening_22.mp3',
                'explanation' => 'Pria itu merasa terkejut karena hasilnya lebih dari yang ia kira.',
                'options' => [
                    ['text' => 'Disappointed', 'is_correct' => false],
                    ['text' => 'Surprised and pleased.', 'is_correct' => true],
                    ['text' => 'Nervous and unsure.', 'is_correct' => false],
                    ['text' => 'Uninterested.', 'is_correct' => false],
                ],
            ],
            // Soal 23
            [
                'question_text' => 'What does the woman offer?',
                'audio_url' => 'Listening_23.mp3',
                'explanation' => 'Wanita itu menawarkan untuk membantu proyek pria itu dengan riset.',
                'options' => [
                    ['text' => 'To give him a ride.', 'is_correct' => false],
                    ['text' => 'To finish the project for him.', 'is_correct' => false],
                    ['text' => 'To help with research.', 'is_correct' => true],
                    ['text' => 'To edit his paper.', 'is_correct' => false],
                ],
            ],
            // Soal 24
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_24.mp3',
                'explanation' => 'Opsi D menjelaskan bahwa maksud pria tersebut adalah mendapat nilai tinggi.',
                'options' => [
                    ['text' => 'He didn’t pass the test.', 'is_correct' => false],
                    ['text' => 'He failed the exam.', 'is_correct' => false],
                    ['text' => 'He was surprised by his grade.', 'is_correct' => false],
                    ['text' => 'He received a high score.', 'is_correct' => true],
                ],
            ],
            // Soal 25
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_25.mp3',
                'explanation' => 'Pria itu dan Tom tidak akan pergi karena mereka tidak tertarik.',
                'options' => [
                    ['text' => 'Only Tom wants to go to the premiere.', 'is_correct' => false],
                    ['text' => 'He and Tom don’t plan to attend the premiere.', 'is_correct' => true],
                    ['text' => 'The premiere was canceled for both of them.', 'is_correct' => false],
                    ['text' => 'Both he and Tom are excited to see the movie.', 'is_correct' => false],
                ],
            ],
            // Soal 26
            [
                'question_text' => 'What does the man imply?',
                'audio_url' => 'Listening_26.mp3',
                'explanation' => 'Pria itu tidak pergi ke dokter karena sudah mendapatkan salep yang manjur.',
                'options' => [
                    ['text' => 'He has already seen the doctor.', 'is_correct' => false],
                    ['text' => 'He has found a way to treat his skin condition.', 'is_correct' => true],
                    ['text' => 'He is still waiting for the doctor\'s appointment.', 'is_correct' => false],
                    ['text' => 'His condition is getting worse day by day.', 'is_correct' => false],
                ],
            ],
            // Soal 27
            [
                'question_text' => 'What will the woman probably do?',
                'audio_url' => 'Listening_27.mp3',
                'explanation' => 'Wanita menolak tumpangan karena apartemennya dekat dan ingin udara segar, sehingga pasti berjalan kaki.',
                'options' => [
                    ['text' => 'She will drive herself home.', 'is_correct' => false],
                    ['text' => 'She will take a taxi.', 'is_correct' => false],
                    ['text' => 'She will walk home.', 'is_correct' => true],
                    ['text' => 'She will wait for someone else to pick her up.', 'is_correct' => false],
                ],
            ],
            // Soal 28
            [
                'question_text' => 'What does the man suggest the woman do?',
                'audio_url' => 'Listening_28.mp3',
                'explanation' => 'Pria tidak bisa membantu secara langsung, tapi ia memberi saran tempat lain (apotek 24 jam).',
                'options' => [
                    ['text' => 'Wait until tomorrow', 'is_correct' => false],
                    ['text' => 'Go to the nearby pharmacy that’s open 24 hours', 'is_correct' => true],
                    ['text' => 'Ask someone else to buy it', 'is_correct' => false],
                    ['text' => 'Rest at home instead', 'is_correct' => false],
                ],
            ],
            // Soal 29
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_29.mp3',
                'explanation' => 'Kalimat "I\'ll be happy to give you a hand with it" berarti pria itu menawarkan bantuan.',
                'options' => [
                    ['text' => 'He wants to see the paintings', 'is_correct' => false],
                    ['text' => 'He wants to critique her show', 'is_correct' => false],
                    ['text' => 'He is offering to help', 'is_correct' => true],
                    ['text' => 'He’s had a show there before', 'is_correct' => false],
                ],
            ],
            // Soal 30
            [
                'question_text' => 'What does the woman imply the man should do?',
                'audio_url' => 'Listening_30.mp3',
                'explanation' => 'Nada kalimatnya menunjukkan kekhawatiran dan keheranan, bukan dukungan.',
                'options' => [
                    ['text' => 'She supports his decision', 'is_correct' => false],
                    ['text' => 'She thinks he’s taking on too much', 'is_correct' => true],
                    ['text' => 'She wants to do the same', 'is_correct' => false],
                    ['text' => 'She advises him to take more credits', 'is_correct' => false],
                ],
            ],
            // Soal 31
            [
                'question_text' => 'What does the woman imply?',
                'audio_url' => 'Listening_31.mp3',
                'explanation' => 'Wanita tersebut menyiratkan bahwa pria tersebut mungkin membutuhkan kacamata baru.',
                'options' => [
                    ['text' => 'He should sit closer', 'is_correct' => false],
                    ['text' => 'He should talk to his doctor', 'is_correct' => false],
                    ['text' => 'He probably needs new glasses', 'is_correct' => true],
                    ['text' => 'The board needs to be moved', 'is_correct' => false],
                ],
            ],
            // Soal 32
            [
                'question_text' => 'What does the man imply?',
                'audio_url' => 'Listening_32.mp3',
                'explanation' => 'Ini berarti dia mengharapkan cuaca menjadi lebih hangat.',
                'options' => [
                    ['text' => 'He enjoys the cold weather.', 'is_correct' => false],
                    ['text' => 'He’s ready for autumn.', 'is_correct' => false],
                    ['text' => 'He hopes the weather gets warmer.', 'is_correct' => true],
                    ['text' => 'He likes winter clothes', 'is_correct' => false],
                ],
            ],
            // Soal 33
            [
                'question_text' => 'What does the man suggest the woman do?',
                'audio_url' => 'Listening_33.mp3',
                'explanation' => 'Dia menyarankan agar wanita tersebut mempertimbangkan tinggal di South dorm.',
                'options' => [
                    ['text' => 'Consider living in the South dorm.', 'is_correct' => true],
                    ['text' => 'Rent an apartment off-campus.', 'is_correct' => false],
                    ['text' => 'Keep commuting like before.', 'is_correct' => false],
                    ['text' => 'Find a roommate on campus.', 'is_correct' => false],
                ],
            ],
            // Soal 34
            [
                'question_text' => 'On what nights is the store open late?',
                'audio_url' => 'Listening_34.mp3',
                'explanation' => 'Pria meluruskan bahwa yang benar hanyalah Kamis dan Jumat saja.',
                'options' => [
                    ['text' => 'Tuesday and Wednesday', 'is_correct' => false],
                    ['text' => 'Tuesday through Friday', 'is_correct' => false],
                    ['text' => 'Thursday and Friday', 'is_correct' => true],
                    ['text' => 'Only Friday', 'is_correct' => false],
                ],
            ],
            // Soal 35
            [
                'question_text' => 'What can be inferred about the man?',
                'audio_url' => 'Listening_35.mp3',
                'explanation' => 'Dapat disimpulkan bahwa dia tidak mengenal lokasi-lokasi di kampus.',
                'options' => [
                    ['text' => 'He works at the university.', 'is_correct' => false],
                    ['text' => 'He is a student in the department.', 'is_correct' => false],
                    ['text' => 'He is unfamiliar with the campus.', 'is_correct' => true],
                    ['text' => 'He is on his way to the dean’s office.', 'is_correct' => false],
                ],
            ],
            // Soal 36
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_36.mp3',
                'explanation' => 'Dia menyatakan akan mengganti makanan yang salah dengan yang benar.',
                'options' => [
                    ['text' => 'She will bring him the correct order.', 'is_correct' => true],
                    ['text' => 'She will cancel the order.', 'is_correct' => false],
                    ['text' => 'She thinks chicken salad is what he ordered.', 'is_correct' => false],
                    ['text' => 'She wants him to keep the chicken salad.', 'is_correct' => false],
                ],
            ],
            // Soal 37
            [
                'question_text' => 'Why was the man late?',
                'audio_url' => 'Listening_37.mp3',
                'explanation' => 'Pria menjelaskan bahwa dia terlambat karena tempatnya sulit ditemukan.',
                'options' => [
                    ['text' => 'He overslept.', 'is_correct' => false],
                    ['text' => 'He was waiting for someone.', 'is_correct' => false],
                    ['text' => 'He had trouble finding the location.', 'is_correct' => true],
                    ['text' => 'He was giving someone a ride.', 'is_correct' => false],
                ],
            ],
            // Soal 38
            [
                'question_text' => 'What happened to the card?',
                'audio_url' => 'Listening_38.mp3',
                'explanation' => 'Kartunya sudah diambil oleh orang lain (Kathy) atas nama Joan.',
                'options' => [
                    ['text' => 'Joan forgot to get it.', 'is_correct' => false],
                    ['text' => 'Kathy picked it up for Joan.', 'is_correct' => true],
                    ['text' => 'It was lost.', 'is_correct' => false],
                    ['text' => 'It hasn’t been printed yet.', 'is_correct' => false],
                ],
            ],
            // Soal 39
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_39.mp3',
                'explanation' => 'Pria menyiratkan bahwa dia tidak akan menyetir karena belum mampu membeli mobil.',
                'options' => [
                    ['text' => 'He won’t be able to drive because he doesn’t have a car.', 'is_correct' => true],
                    ['text' => 'He wants to buy a motorbike instead.', 'is_correct' => false],
                    ['text' => 'He plans to carpool with someone.', 'is_correct' => false],
                    ['text' => 'He isn’t going to school this year.', 'is_correct' => false],
                ],
            ],
            // Soal 40
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_40.mp3',
                'explanation' => 'Ungkapan “he’ll put me up” berarti dia akan menampung saya atau memberi saya tempat tinggal sementara.',
                'options' => [
                    ['text' => 'She will stay in a hotel.', 'is_correct' => false],
                    ['text' => 'She will stay at her cousin’s place.', 'is_correct' => true],
                    ['text' => 'She doesn’t have a place to stay yet.', 'is_correct' => false],
                    ['text' => 'She is still deciding where to stay.', 'is_correct' => false],
                ],
            ],
            // Soal 41
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_41.mp3',
                'explanation' => 'Dia tidak bisa menerima undangan karena sudah ada rencana sebelumnya.',
                'options' => [
                    ['text' => 'She will come after the show.', 'is_correct' => false],
                    ['text' => 'She can’t accept the invitation because she already has plans.', 'is_correct' => true],
                    ['text' => 'She wants to reschedule.', 'is_correct' => false],
                    ['text' => 'She forgot about the dinner.', 'is_correct' => false],
                ],
            ],
            // Soal 42
            [
                'question_text' => 'What does the woman suggest the man do?',
                'audio_url' => 'Listening_42.mp3',
                'explanation' => 'Meja referensi di perpustakaan berfungsi membantu pengunjung menemukan sumber.',
                'options' => [
                    ['text' => 'Search the internet', 'is_correct' => false],
                    ['text' => 'Ask the reference desk for help', 'is_correct' => true],
                    ['text' => 'Talk to the professor again', 'is_correct' => false],
                    ['text' => 'Stop searching', 'is_correct' => false],
                ],
            ],
            // Soal 43
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_43.mp3',
                'explanation' => 'Ungkapan "I have a rough idea" berarti pria tersebut memiliki gambaran umum tetapi tidak mengetahui semuanya secara pasti.',
                'options' => [
                    ['text' => 'He knows exactly what the requirements are.', 'is_correct' => false],
                    ['text' => 'He knows part of it but not everything.', 'is_correct' => true],
                    ['text' => 'He doesn’t know at all.', 'is_correct' => false],
                    ['text' => 'He’s already completed the course.', 'is_correct' => false],
                ],
            ],
            // Soal 44
            [
                'question_text' => 'What does the man say about Alice?',
                'audio_url' => 'Listening_44.mp3',
                'explanation' => 'Kalimat "she hasn\'t been able to make up her mind" berarti dia masih belum memutuskan.',
                'options' => [
                    ['text' => 'She chose American history.', 'is_correct' => false],
                    ['text' => 'She’s not interested in studying.', 'is_correct' => false],
                    ['text' => 'She is still undecided about her major.', 'is_correct' => true],
                    ['text' => 'She wants to study everything at once.', 'is_correct' => false],
                ],
            ],
            // Soal 45
            [
                'question_text' => 'How does the man feel?',
                'audio_url' => 'Listening_45.mp3',
                'explanation' => 'Pria tersebut mengatakan “I just can’t wait any longer,” yang menunjukkan bahwa dia sedang terburu-buru.',
                'options' => [
                    ['text' => 'He’s relaxed and willing to wait.', 'is_correct' => false],
                    ['text' => 'He’s annoyed at the manager.', 'is_correct' => false],
                    ['text' => 'He’s in a hurry and can’t wait any longer.', 'is_correct' => true],
                    ['text' => 'He no longer wants to talk to the manager.', 'is_correct' => false],
                ],
            ],
            // Soal 46
            [
                'question_text' => 'What does the man suggest the woman do?',
                'audio_url' => 'Listening_46.mp3',
                'explanation' => 'Dia menyarankan untuk mengatur prioritas dan fokus pada hal yang paling penting terlebih dahulu.',
                'options' => [
                    ['text' => 'Set priorities and focus on what’s most important', 'is_correct' => true],
                    ['text' => 'Cancel one of the projects', 'is_correct' => false],
                    ['text' => 'Ask others for help', 'is_correct' => false],
                    ['text' => 'Complain to the professor', 'is_correct' => false],
                ],
            ],
            // Soal 47
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_47.mp3',
                'explanation' => 'Sally memang dikenal suka meminjam uang dan tidak segera membayarnya kembali.',
                'options' => [
                    ['text' => 'Sally often doesn\'t pay back money she borrows.', 'is_correct' => true],
                    ['text' => 'Sally forgot she borrowed money.', 'is_correct' => false],
                    ['text' => 'Sally didn\'t know she had to pay.', 'is_correct' => false],
                    ['text' => 'Sally doesn\'t have money to pay her back.', 'is_correct' => false],
                ],
            ],
            // Soal 48
            [
                'question_text' => 'What does the man mean?',
                'audio_url' => 'Listening_48.mp3',
                'explanation' => 'Dia tidak punya waktu untuk melakukan hal lain, termasuk bermain tenis.',
                'options' => [
                    ['text' => 'He isn’t interested in tennis anymore.', 'is_correct' => false],
                    ['text' => 'He’s too busy to play tennis.', 'is_correct' => true],
                    ['text' => 'He’s not allowed to play tennis.', 'is_correct' => false],
                    ['text' => 'He moved away from campus.', 'is_correct' => false],
                ],
            ],
            // Soal 49
            [
                'question_text' => 'What does the woman imply the man should do?',
                'audio_url' => 'Listening_49.mp3',
                'explanation' => 'Ini merupakan saran agar dia menghadiri sesi review untuk membantunya memahami pelajaran.',
                'options' => [
                    ['text' => 'Study at home alone', 'is_correct' => false],
                    ['text' => 'Attend the review sessions', 'is_correct' => true],
                    ['text' => 'Ask the professor directly', 'is_correct' => false],
                    ['text' => 'Drop the class', 'is_correct' => false],
                ],
            ],
            // Soal 50
            [
                'question_text' => 'What does the woman mean?',
                'audio_url' => 'Listening_50.mp3',
                'explanation' => 'Wanita itu bilang bahwa masalah dari komputer seharusnya sudah beres minggu depan.',
                'options' => [
                    ['text' => 'She will change his grade manually.', 'is_correct' => false],
                    ['text' => 'The mistake will be corrected soon.', 'is_correct' => true],
                    ['text' => 'The student needs to contact the registrar.', 'is_correct' => false],
                    ['text' => 'The grade cannot be fixed.', 'is_correct' => false],
                ],
            ],
        ];

        // 3. Loop melalui data dan buat entri di database
        foreach ($questionsData as $questionData) {
            $question = Question::create([
                'question_group_id' => $listeningGroup->id,
                'question_text' => $questionData['question_text'],
                'audio_url' => $questionData['audio_url'],
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