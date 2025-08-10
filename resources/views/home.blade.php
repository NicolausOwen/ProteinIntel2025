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
    <!-- Hero Section -->
    <section class="relative min-h-screen bg-transparent flex items-center justify-center overflow-x-hidden">
        <!-- Lava Lamp Background -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Ellipse 1 -->
            <div class="absolute -top-32 -left-32 w-[40rem] h-[40rem] bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 rounded-full blur-[120px] opacity-70 animate-lava"></div>
            <!-- Ellipse 2 -->
            <div class="absolute top-1/2 -right-32 w-[35rem] h-[35rem] bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500 rounded-full blur-[120px] opacity-70 animate-lava-slow"></div>
            <!-- Ellipse 3 -->
            <div class="absolute bottom-0 left-1/3 w-[30rem] h-[30rem] bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 rounded-full blur-[100px] opacity-60 animate-lava-fast"></div>
        </div>
        
        <!-- Main Content -->
        <div class="relative z-10 text-center px-4 max-w-6xl mx-auto">
            <!-- Main Title -->
            <h1 class="text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black mb-4 leading-none">
                <span class="bg-gradient-to-r from-white via-gray-100 to-gray-200 bg-clip-text text-transparent">PROTEIN</span>
                <span class="text-gray-100 ml-4">2025</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-gray-200 text-lg md:text-xl lg:text-2xl font-light mb-8 max-w-4xl mx-auto leading-relaxed">
                Speak The World: Empowering Global Citizens Through English 2025
            </p>
            
            <!-- Date Badge -->
            <div class="inline-block bg-gray-900/90 backdrop-blur-sm rounded-full px-8 py-3 mb-12 border border-gray-600">
                <span class="text-white font-medium text-lg">23rd August 2025</span>
            </div>
            
            <!-- Social Media Icons -->
            <div class="bg-gray-800/80 backdrop-blur-sm border border-gray-600 inline-flex items-center space-x-6 rounded-full px-8 py-4">
                <!-- TikTok -->
                <a href="#" class="text-gray-200 hover:text-white transition-colors duration-300 flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-.88-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                    </svg>
                    <span class="ml-2 text-sm hidden md:inline">@intelunsri</span>
                </a>
                
                <!-- Instagram -->
                <a href="#" class="text-gray-200 hover:text-white transition-colors duration-300 flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                    </svg>
                    <span class="ml-2 text-sm hidden md:inline">@intelunsri</span>
                </a>
                
                <!-- YouTube -->
                <a href="#" class="text-gray-200 hover:text-white transition-colors duration-300 flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                    <span class="ml-2 text-sm hidden md:inline">Intel Unsri</span>
                </a>
                
                <!-- LinkedIn -->
                <a href="#" class="text-gray-200 hover:text-white transition-colors duration-300 flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                    <span class="ml-2 text-sm hidden md:inline">Intel Fasilkom Unsri</span>
                </a>
            </div>
        </div>

                
    </section>

    <!-- Getting Started Section -->
    <section class="w-full h-[100vh] lg:h-[70vh] bg-white flex items-center justify-center">
        <div class="relative flex flex-col lg:flex-row items-center justify-center gap-8 w-full max-w-6xl px-6 lg:px-10">

            <div class="hidden lg:flex absolute inset-0 z-1 w-screen">
                <div class="w-1/5 "></div>
                <div class="w-4/5 bg-gradient-to-r from-[#B8CFCE] to-[#7F8CAA]"></div>
            </div>

            <!-- Left Side Image -->
            <div class="w-[80%] md:w-[50%] flex justify-center z-10">
                <img src="{{ asset('img/home/gambar.jpg') }}" alt="gambar"
                    class="rounded-[200px] w-full max-w-lg h-auto object-cover transition-all duration-500">
            </div>

            <!-- Right Side Text -->
            <div class="w-full md:w-[50%] text-center lg:text-left z-10">
                <h1
                    class="text-2xl lg:text-3xl font-extrabold mb-4 bg-gradient-to-r from-slate-800 via-slate-700 to-slate-900 bg-clip-text text-transparent drop-shadow-sm">
                    GETTING STARTED TO PROTEIN 2025
                </h1>
                <p class="text-sm lg:text-base mb-8 text-slate-800 leading-relaxed font-medium">
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
    </section>

    <!-- PARALLAX CARD -->
    <div class="relative inset-x-0 h-[120vh] -mt-[20vh] pointer-events-none -z-10">
        <div class="sticky top-1/2 -translate-y-1/2 flex justify-center">
            <div class="max-w-3xl bg-white/80 backdrop-blur-md p-8 rounded-2xl shadow-xl border border-white/20">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 text-center mb-4">
                    What is <span class="text-[#7F8CAA]">PROTEIN</span>?
                </h2>
                <div class="prose prose-slate max-w-none">
                    <p>
                    <img src="{{ asset('img/home/gambar.jpg') }}" alt="Protein Image"
                        class="float-left mr-4 mb-2 w-40 h-40 object-cover rounded-full shadow-lg border border-slate-200"
                        style="shape-outside: circle(50%); clip-path: circle(50%);">
                    PROTEIN is a comprehensive program designed to help students sharpen their English
                    proficiency, prepare for the USEPT, and open doors to academic and professional
                    opportunities. Our curriculum blends interactive learning with proven strategies, ensuring
                    every participant gains the confidence and skills needed to excel.
                    </p>
                </div>
            </div>
        </div>
    </div>

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