@extends('layouts.app')

@section('title', 'HOME')

@push('styles')
    <style>
        @keyframes gradient {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
        }
    </style>
@endpush

@section('content')
    <!-- Hero Section with Starry Background -->
    <section class="relative bg-cover bg-center bg-no-repeat lg:h-[70vh] md:h-[50vh] h-[30vh] max-h-[800px]"
        style="background-image: url('{{ asset('img/home/banner.png') }}');">

        <div class="relative z-20 flex flex-col items-center justify-center h-full text-white text-center px-4">

            <!-- Dim Effect -->
            {{-- <div class="absolute inset-0 bg-black/40 z-10"></div> --}}

            <!-- Overlay Elements -->
            {{-- <div class="absolute inset-0 flex flex-col items-center justify-center z-10 text-center px-6">
                <!-- Theme -->
                <div class="mb-4">
                    <h1 class="text-white text-6xl font-bold tracking-wide">PROTEIN 2025</h1>
                    <p class="text-white/90 text-xl mt-2 max-w-2xl">
                        Speak The World: Empowering Global Citizens Through English 2025
                    </p>
                </div>

                <!-- Event Date -->
                <div class="bg-black/70 text-white px-6 py-2 rounded-full text-sm mb-8">
                    23th August 2025
                </div>

                <!-- Interactive Buttons -->
                <div class="flex gap-4">
                    <a href="#" class="bg-black/40 text-white px-4 py-2 rounded-full hover:bg-black/60 transition">
                        TikTok @Intelunsri
                    </a>
                    <a href="#" class="bg-black/40 text-white px-4 py-2 rounded-full hover:bg-black/60 transition">
                        Instagram Intel Unsri
                    </a>
                    <a href="#" class="bg-black/40 text-white px-4 py-2 rounded-full hover:bg-black/60 transition">
                        LinkedIn Intel Fasilkom Unsri
                    </a>
                </div>
            </div> --}}
    </section>

    <!-- Getting Started Section -->
    <section class="py-16">
        <div
            class="p-6 relative flex flex-col-reverse lg:flex-row overflow-hidden h-auto bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] lg:h-[350px]">

            <div class="hidden lg:flex w-full h-full absolute inset-0 z-0">
                <div class="w-1/5 bg-white"></div>
                <div class="w-4/5 bg-gradient-to-r from-[#B8CFCE] to-[#7F8CAA]"></div>
            </div>

            <div class="w-full gap-2 relative flex flex-col lg:flex-row items-center px-6 lg:px-10">

                <div class="w-[80%] md:w-[60%] h-[95%] lg:ml-[-100px] flex justify-center lg:mx-6 mb-4 lg:mb-0">
                    <img src="{{ asset('img/home/gambar.jpg') }}" alt="gambar"
                        class="rounded-[200px] w-full max-w-lg h-auto object-cover shadow-2xl hover:shadow-3xl transition-all duration-500">
                </div>

                <div class="w-full lg:w-[40%] text-center lg:mr-auto">
                    <h1
                        class="text-2xl lg:text-3xl font-extrabold mb-4 bg-gradient-to-r from-slate-800 via-slate-700 to-slate-900 bg-clip-text text-transparent text-justify drop-shadow-sm">
                        GETTING STARTED TO PROTEIN 2025
                    </h1>
                    <p class="text-sm lg:text-base mb-8 text-slate-800 text-justify leading-relaxed font-medium">
                        Unlock boundless opportunities with <strong
                            class="bg-gradient-to-r from-slate-700 to-slate-900 bg-clip-text text-transparent font-bold">PROTEIN!</strong>
                        Develop your English skills, Ace the USEPT, and Step further into a bright future.
                    </p>
                    <div class="flex justify-center lg:justify-start">
                        <button
                            class="bg-gradient-to-r from-[#585a7d] to-[#333446] text-white font-semibold py-3 px-8 rounded-full shadow-2xl hover:shadow-3xl hover:from-[#333446] hover:to-[#585a7d] transition-all duration-300 transform hover:scale-105 backdrop-blur-sm border border-white/10">
                            START NOW
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What is PROTEIN Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-8 text-gray-800">
                What is PROTEIN?
            </h2>
            <div class="max-w-4xl mx-auto">
                <p class="text-gray-700 text-lg leading-relaxed">
                    Protein is TOEFL/USEPT test simulation for Sriwijaya University students, where students can practice
                    solving
                    TOEFL-like problems. This activity is to introduce Unsri students, especially at the Faculty of Computer
                    Science with USEPT test problems and also help students to improve their ability to answer questions.
                </p>
            </div>
        </div>
    </section>

    <!-- Why Take PROTEIN Section -->
    <section class="py-16 bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE]">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center text-gray-800">
                Why Take PROTEIN?
            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-[#EAEFEF] to-slate-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <span class="text-white text-2xl">📚</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">
                        Comprehensive Practice
                    </h3>
                    <p class="text-gray-600 text-center leading-relaxed">
                        Access a wide range of TOEFL-style questions and practice materials designed specifically
                        for Sriwijaya University students to excel in their USEPT exams.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-[#EAEFEF] to-slate-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <span class="text-white text-2xl">⚡</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">
                        Skill Enhancement
                    </h3>
                    <p class="text-gray-600 text-center leading-relaxed">
                        Improve your English proficiency through targeted exercises that focus on reading,
                        listening, and language structure components of the test.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="bg-white rounded-xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-[#EAEFEF] to-slate-500 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <span class="text-white text-2xl">🎯</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-4 text-center text-gray-800">
                        Future Opportunities
                    </h3>
                    <p class="text-gray-600 text-center leading-relaxed">
                        Open doors to global opportunities by mastering English proficiency tests,
                        paving the way for academic and professional success worldwide.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-gradient-to-br from-gray-50 to-white px-6 relative overflow-hidden">
        <!-- Background decoration -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-20 h-20 bg-[#B8CFCE] rounded-full blur-xl animate-pulse"></div>
            <div class="absolute bottom-32 right-16 w-16 h-16 bg-[#7F8CAA] rounded-full blur-xl animate-pulse delay-1000"></div>
            <div class="absolute top-1/2 left-1/4 w-12 h-12 bg-[#8794ba] rounded-full blur-xl animate-pulse delay-500"></div>
        </div>
        
        <div class="max-w-4xl mx-auto relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-[#7F8CAA] via-[#8794ba] to-[#B8CFCE] bg-clip-text text-transparent animate-gradient">
                    Why Take PROTEIN? - FAQ
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] mx-auto rounded-full"></div>
            </div>
            
            <div class="space-y-6">
                <!-- FAQ Item 1 -->
                <div class="group bg-white/80 backdrop-blur-lg rounded-2xl border border-[#B8CFCE]/30 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02]">
                    <button class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gradient-to-r hover:from-[#EAEFEF]/50 hover:to-transparent transition-all duration-300" onclick="toggleFAQ(1)">
                        <h3 class="text-xl font-bold text-[#7F8CAA] group-hover:text-[#8794ba] transition-colors duration-300">What makes PROTEIN's practice materials comprehensive?</h3>
                        <div class="relative w-8 h-8 flex items-center justify-center">
                            <span class="absolute text-2xl font-bold text-[#7F8CAA] transform transition-all duration-500 ease-in-out" id="icon-1">+</span>
                        </div>
                    </button>
                    <div class="px-8 pb-6 opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out" id="content-1">
                        <div class="pt-4 border-t border-[#B8CFCE]/20">
                            <p class="text-gray-700 leading-relaxed text-lg">PROTEIN offers a wide range of TOEFL-style questions and practice materials specifically designed for Sriwijaya University students. Our comprehensive approach covers all sections of the USEPT exam, ensuring you're well-prepared for every aspect of the test.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="group bg-white/80 backdrop-blur-lg rounded-2xl border border-[#B8CFCE]/30 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02]">
                    <button class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gradient-to-r hover:from-[#EAEFEF]/50 hover:to-transparent transition-all duration-300" onclick="toggleFAQ(2)">
                        <h3 class="text-xl font-bold text-[#7F8CAA] group-hover:text-[#8794ba] transition-colors duration-300">How does PROTEIN enhance my English skills?</h3>
                        <div class="relative w-8 h-8 flex items-center justify-center">
                            <span class="absolute text-2xl font-bold text-[#7F8CAA] transform transition-all duration-500 ease-in-out" id="icon-2">+</span>
                        </div>
                    </button>
                    <div class="px-8 pb-6 opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out" id="content-2">
                        <div class="pt-4 border-t border-[#B8CFCE]/20">
                            <p class="text-gray-700 leading-relaxed text-lg">PROTEIN improves your English proficiency through targeted exercises that focus on reading comprehension, listening skills, and language structure components. Our practice sessions are designed to strengthen your weak areas and build confidence in all aspects of English proficiency testing.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="group bg-white/80 backdrop-blur-lg rounded-2xl border border-[#B8CFCE]/30 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02]">
                    <button class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gradient-to-r hover:from-[#EAEFEF]/50 hover:to-transparent transition-all duration-300" onclick="toggleFAQ(3)">
                        <h3 class="text-xl font-bold text-[#7F8CAA] group-hover:text-[#8794ba] transition-colors duration-300">What future opportunities can PROTEIN help me achieve?</h3>
                        <div class="relative w-8 h-8 flex items-center justify-center">
                            <span class="absolute text-2xl font-bold text-[#7F8CAA] transform transition-all duration-500 ease-in-out" id="icon-3">+</span>
                        </div>
                    </button>
                    <div class="px-8 pb-6 opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out" id="content-3">
                        <div class="pt-4 border-t border-[#B8CFCE]/20">
                            <p class="text-gray-700 leading-relaxed text-lg">By mastering English proficiency tests through PROTEIN, you open doors to global opportunities including international scholarships, study abroad programs, multinational job opportunities, and professional certifications that require English proficiency. This paves the way for both academic and professional success worldwide.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="group bg-white/80 backdrop-blur-lg rounded-2xl border border-[#B8CFCE]/30 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02]">
                    <button class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gradient-to-r hover:from-[#EAEFEF]/50 hover:to-transparent transition-all duration-300" onclick="toggleFAQ(4)">
                        <h3 class="text-xl font-bold text-[#7F8CAA] group-hover:text-[#8794ba] transition-colors duration-300">How does PROTEIN prepare me specifically for USEPT?</h3>
                        <div class="relative w-8 h-8 flex items-center justify-center">
                            <span class="absolute text-2xl font-bold text-[#7F8CAA] transform transition-all duration-500 ease-in-out" id="icon-4">+</span>
                        </div>
                    </button>
                    <div class="px-8 pb-6 opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out" id="content-4">
                        <div class="pt-4 border-t border-[#B8CFCE]/20">
                            <p class="text-gray-700 leading-relaxed text-lg">PROTEIN is specifically tailored for Sriwijaya University students preparing for USEPT. Our simulation tests mirror the actual USEPT format and difficulty level, giving you familiarity with the test structure, timing, and question types you'll encounter on the actual exam day.</p>
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="group bg-white/80 backdrop-blur-lg rounded-2xl border border-[#B8CFCE]/30 overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02]">
                    <button class="w-full px-8 py-6 text-left flex justify-between items-center hover:bg-gradient-to-r hover:from-[#EAEFEF]/50 hover:to-transparent transition-all duration-300" onclick="toggleFAQ(5)">
                        <h3 class="text-xl font-bold text-[#7F8CAA] group-hover:text-[#8794ba] transition-colors duration-300">What support does PROTEIN provide during practice sessions?</h3>
                        <div class="relative w-8 h-8 flex items-center justify-center">
                            <span class="absolute text-2xl font-bold text-[#7F8CAA] transform transition-all duration-500 ease-in-out" id="icon-5">+</span>
                        </div>
                    </button>
                    <div class="px-8 pb-6 opacity-0 max-h-0 overflow-hidden transition-all duration-500 ease-in-out" id="content-5">
                        <div class="pt-4 border-t border-[#B8CFCE]/20">
                            <p class="text-gray-700 leading-relaxed text-lg">PROTEIN provides detailed explanations for each practice question, performance analytics to track your progress, and personalized recommendations for improvement. Our support system helps you identify strengths and weaknesses, allowing you to focus your study efforts more effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function toggleFAQ(itemNumber) {
            const content = document.getElementById(`content-${itemNumber}`);
            const icon = document.getElementById(`icon-${itemNumber}`);
            
            if (content.style.maxHeight === '0px' || content.style.maxHeight === '') {
                // Open the FAQ
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.opacity = '1';
                icon.style.transform = 'rotate(45deg)';
                icon.textContent = '×';
            } else {
                // Close the FAQ
                content.style.maxHeight = '0px';
                content.style.opacity = '0';
                icon.style.transform = 'rotate(0deg)';
                icon.textContent = '+';
            }
        }
    </script>
@endpush