@extends('layouts.app')

@section('title', 'Quiz')

@push('styles')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush

@section('content')
    <!-- Quiz Introduction -->
    <section class="relative h-screen">
        <!-- Lava Lamp Background -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Ellipse 1 -->
            <div class="absolute -top-32 -left-32 w-[40rem] h-[40rem] bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 rounded-full blur-[120px] opacity-70 animate-lava"></div>
            <!-- Ellipse 2 -->
            <div class="absolute top-1/2 -right-32 w-[35rem] h-[35rem] bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500 rounded-full blur-[120px] opacity-70 animate-lava-slow"></div>
            <!-- Ellipse 3 -->
            <div class="absolute bottom-0 left-1/3 w-[30rem] h-[30rem] bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 rounded-full blur-[100px] opacity-60 animate-lava-fast"></div>
        </div>
        
        <!-- Container pusat dengan max-width dan padding -->
        <div
            class="relative max-w-7xl mx-auto px-6 sm:px-12 md:px-20 py-20 min-h-screen flex flex-col-reverse md:flex-row items-center justify-between gap-8">

            <!-- Text Section -->
            <div class="flex-1 max-w-xl space-y-6">
                <div class="space-y-4">
                    <h1 class="font-title text-3xl sm:text-4xl md:text-5xl font-bold text-gray-100 leading-tight">
                        Ready to test your
                        <span class="gradient-text block mt-2">English skills?</span>
                    </h1>
                    <p class="text-base sm:text-lg text-gray-200 leading-relaxed">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis numquam aliquid rerum vel
                        officia iusto maiores nisi hic ex laborum!
                    </p>
                </div>

                <!-- Countdown / CTA -->
                <div x-data="countdownTimer('2025-08-16T14:30:15')" x-init="startTimer()">
                    <!-- Countdown -->
                    <div x-show="!expired" x-cloak class="w-full max-w-md">
                        <p class="font-title text-base sm:text-lg font-bold mb-4 text-[#333446]">Quiz available in:</p>
                        <div class="flex items-center justify-start gap-3 sm:gap-4">
                            <template x-for="unit in timerUnits" :key="unit.label">
                                <div
                                    class="rounded-xl shadow-[0_0_30px_rgba(184,207,206,0.3)] p-3 sm:p-4 text-center flex-1 transition-transform duration-300 hover:scale-105 backdrop-blur-md border border-white/20 bg-white/25">
                                    <div class="text-2xl sm:text-3xl font-bold text-[#333446]" x-text="unit.value"></div>
                                    <div class="text-xs sm:text-sm text-[#7F8CAA] font-semibold" x-text="unit.label"></div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <div x-show="expired" x-cloak>
                        <a href="#quiz-selection"
                            class="inline-block bg-[#333446] text-[#B8CFCE] hover:bg-[#EAEFEF] hover:text-[#333446] focus:ring-4 focus:outline-none focus:ring-[#B8CFCE] font-medium rounded-lg text-base px-8 py-4 md:text-lg md:px-10 md:py-5 transition-all duration-300 hover:scale-105 shadow-md hover:shadow-lg">
                            Select Quiz
                        </a>
                    </div>
                </div>
            </div>

            <!-- Illustration Section -->
            <div class="flex justify-center items-center px-8 mt-6 sm:mt-0">
                <img src="{{ asset('img/take-a-quiz/illustration2.png') }}" alt="Quiz Illustration"
                    class="w-full max-w-xs sm:max-w-md rounded-2xl drop-shadow-md transition-transform duration-300 ease-in-out hover:scale-105 hover:drop-shadow-xl">
            </div>
        </div>
    </section>


    <!-- Quiz Selection -->
    <section class="bg-[#EAEFEF]" id="quiz-selection" >

        <div class="min-h-screen flex items-center justify-center py-20 px-6 sm:px-12">

            <div class="w-full max-w-4xl mx-auto" 
                x-data="{ 
                    activeTab: 'listening',
                    quizCategories: [
                        {
                            id: 'listening',
                            title: 'Listening',
                            description: 'Challenge your listening comprehension. This section tests your ability to understand spoken English in various contexts, from casual dialogues to formal monologues. Your task is to capture key details, main ideas, and the speaker\'s intent.',
                            questions: '35',
                            time: '40',
                            img: '{{ asset('img/take-a-quiz/Listening.svg') }}'
                        },
                        {
                            id: 'structure',
                            title: 'Structure',
                            description: 'Evaluate your understanding of English structure and grammar. This section focuses on your ability to correctly construct sentences and identify errors in written expression. Your precision and knowledge of grammatical rules will be essential.',
                            questions: '25',
                            time: '20',
                            img: '{{ asset('img/take-a-quiz/Structure.svg') }}'
                        },
                        {
                            id: 'reading',
                            title: 'Reading',
                            description: 'Test your reading comprehension skills. This section requires you to analyze various passages, identify main ideas, and interpret vocabulary in context. Success depends on your ability to understand both explicit and implied information.',
                            questions: '40',
                            time: '60',
                            img: '{{ asset('img/take-a-quiz/Reading.svg') }}'
                        }
                    ],
                    get activeCategory() {
                        return this.quizCategories.find(category => category.id === this.activeTab);
                    }
                }" 
                x-cloak>

                <div class="text-center mb-6">
                    <h2 class="font-title text-3xl sm:text-4xl md:text-5xl font-bold text-[#333446] mb-2">Select Your Quiz</h2>
                    <p class="text-base sm:text-lg text-[#7F8CAA]">Choose a quiz to test your English skills.</p>
                </div>

                <!-- Tab Navigation -->
                <div class="flex flex-col sm:flex-row justify-center space-y-2 sm:space-y-0 sm:space-x-6 mb-6">
                    <template x-for="(category, key) in quizCategories" :key="category.id">
                        <button @click="activeTab = category.id"
                            :class="{
                                'bg-[#333446] text-[#B8CFCE] font-bold border-[#B8CFCE]': activeTab === category.id,
                                'bg-white text-[#7F8CAA] border-gray-300 hover:bg-gray-50': activeTab !== category.id
                            }"
                            class="px-6 py-3 rounded-lg border-2 font-semibold transition-all duration-200 
                                focus:outline-none focus:ring-2 focus:ring-accent-soft focus:ring-opacity-50 
                                text-sm sm:text-base"
                            x-text="category.title">
                        </button>
                    </template>
                </div>

                <!-- Tab Content -->
                <div class="p-6 md:p-8 border-3 border-[#B8CFCE] rounded-lg shadow-md " 
                    x-show="activeCategory"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-4"
                    x-transition:enter-end="opacity-100 transform translate-y-0">

                    <div class="flex flex-col lg:flex-row items-center gap-8">

                        <!-- Icon -->
                        <div class="flex-shrink-0 p-4">
                            <div class="w-32 h-32 md:w-40 md:h-40 flex items-center justify-center">
                                <img :src="activeCategory.img" :alt="activeCategory.title + ' icon'"
                                    class="max-w-full max-h-full object-contain">
                            </div>
                        </div>

                        <!-- Info -->
                        <div class="flex-1 text-center lg:text-left">
                            <h2 class="font-title text-2xl md:text-3xl font-bold text-[#333446] mb-4"
                                x-text="activeCategory.title + ' Quiz'"></h2>
                            <p class="text-[#7F8CAA] text-base md:text-lg leading-relaxed mb-4"
                                x-text="activeCategory.description"></p>

                            <div class="flex flex-col sm:flex-row gap-4 mb-8 text-sm md:text-base">
                                <div class="flex items-center justify-center lg:justify-start gap-2">
                                    <span class="w-2 h-2 bg-[#B8CFCE] rounded-full"></span>
                                    <span class="text-[#7F8CAA]"><span x-text="activeCategory.questions"></span>
                                        Questions</span>
                                </div>
                                <div class="flex items-center justify-center lg:justify-start gap-2">
                                    <span class="w-2 h-2 bg-[#B8CFCE] rounded-full font-bold"></span>
                                    <span class="text-[#7F8CAA] "><span x-text="activeCategory.time"></span>
                                        Minutes</span>
                                </div>
                            </div>

                            <!-- Start Quiz Button (hanya muncul kalau countdown expired) -->
                            <a :href="'{{url('quiz')}}/' + activeCategory.id"
                            x-show="expired" x-cloak
                            class="inline-block bg-[#333446] text-[#B8CFCE] hover:bg-[#EAEFEF] hover:text-[#333446] 
                                    focus:ring-4 focus:outline-none focus:ring-[#B8CFCE] font-medium rounded-lg 
                                    text-lg px-8 py-4 text-center transition-all duration-300 hover:scale-105 
                                    shadow-md hover:shadow-lg">
                                Start Quiz
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        function countdownTimer(targetDateStr) {
            return {
                targetTime: new Date(targetDateStr).getTime(),
                expired: false,
                intervalId: null,
                // Using an array for easier looping in HTML
                timerUnits: [{
                    label: 'Days',
                    value: '00'
                },
                {
                    label: 'Hours',
                    value: '00'
                },
                {
                    label: 'Minutes',
                    value: '00'
                },
                {
                    label: 'Seconds',
                    value: '00'
                }
                ],

                startTimer() {
                    this.updateDisplay();
                    this.intervalId = setInterval(() => {
                        this.updateDisplay();
                    }, 1000);
                },

                updateDisplay() {
                    const now = new Date().getTime();
                    const distance = this.targetTime - now;

                    if (distance < 0) {
                        clearInterval(this.intervalId);
                        this.expired = true;
                        // Reset all values to 00
                        this.timerUnits.forEach(unit => unit.value = '00');
                        return;
                    }

                    // PadStart function for clean formatting
                    const pad = (num) => String(num).padStart(2, '0');

                    this.timerUnits[0].value = pad(Math.floor(distance / (1000 * 60 * 60 * 24)));
                    this.timerUnits[1].value = pad(Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
                    this.timerUnits[2].value = pad(Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)));
                    this.timerUnits[3].value = pad(Math.floor((distance % (1000 * 60)) / 1000));
                }
            }
        }
    </script>
@endpush