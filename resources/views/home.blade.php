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
            <h1 class="text-6xl md:text-7xl lg:text-8xl xl:text-9xl font-black mb-4 leading-none font-title">
                <span class="bg-gradient-to-r from-white via-gray-100 to-gray-200 bg-clip-text text-transparent">PROTEIN</span>
                <span class="text-gray-100 ml-2 text-[170px]">2025</span>
            </h1>
            
            <!-- Subtitle -->
            <p class="text-gray-200 text-lg md:text-xl lg:text-2xl font-light mb-8 max-w-4xl mx-auto leading-relaxed font-title">
                <span class="text-2xl lg:text-3xl font-extrabold mb-4 bg-gradient-to-r from-slate-800 via-slate-700 to-slate-900 bg-clip-text text-transparent drop-shadow-sm"> Speak The World</span> : Empowering Global Citizens Through English 2025
            </p>
            
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

        {{-- <div class="container mx-auto px-4 text-center">
            <img src="" alt="">
        </div> --}}
    </section>

    <!-- Getting Started Section -->
    <section class="w-full lg:h-[70vh] h-[100vh] bg-gray-50 flex items-center justify-center">
        <div class="relative flex flex-col lg:flex-row items-center justify-center gap-8 w-full max-w-6xl px-6 lg:px-10">

            <div class="hidden lg:flex absolute inset-[-30px] z-1 w-screen h-[120%]">
                <div class="w-1/5 "></div>
                <div class="w-[90%] bg-gradient-to-r from-[#B8CFCE] to-[#7F8CAA]"></div>
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
                    <a
                        href="take-a-quiz"
                        class="bg-gray-800 hover:bg-gray-700 text-white font-semibold py-3 px-8 rounded-full transition-all duration-300 transform hover:scale-105 border-white/10">
                        START NOW
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- What is PROTEIN Section -->
    <section class="bg-gray-50 py-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-8 font-title">
                What is PROTEIN?
            </h2>
            <div class="max-w-4xl mx-auto">
                <p class="text-lg text-gray-700 mb-12 leading-relaxed">
                    PROTEIN is TOEFL/USEPT test simulation for Sriwijaya University Students, where students can practice solving 
                    TOEFL like problems. This activity is to introduce Unsri students, especially at the Faculty of Computer 
                    Science with USEPT test problems and also help students to improve their ability to answer questions.
                </p>

                <!-- Learn More Button -->
                <a href="about-us"
                    class="inline-block bg-gray-800 hover:bg-gray-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition duration-300">
                    Learn More
                </a>
            </div>
        </div>
    </section>

    <!-- Why Take PROTEIN Section -->
    <section class="bg-gray-100 py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 text-center mb-12 font-title">
                Why Take PROTEIN?
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                <!-- Card 1 -->
                <div class="bg-sage-100 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Tingkatkan Kemampuan Bahasa Inggris</h3>
                    <p class="text-gray-700 text-center leading-relaxed">
                        PROTEIN membantu mahasiswa memperkuat kemampuan bahasa Inggris melalui simulasi tes TOEFL/SULIET 
                        yang mencakup Structure, Reading, dan Listening. Kegiatan ini dirancang untuk mempersiapkan diri menghadapi 
                        tes resmi dengan strategi dan materi yang relevan.
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-sage-200 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Persiapan Studi & Karier Global</h3>
                    <p class="text-gray-700 text-center leading-relaxed">
                        Dengan hasil tes yang diakui secara internasional, mahasiswa dapat membuka peluang lebih luas untuk melanjutkan 
                        studi, mendapatkan beasiswa, dan mengembangkan karier di lingkungan global.
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-sage-200 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Seminar Strategi Sukses TOEFL</h3>
                    <p class="text-gray-700 text-center leading-relaxed">
                        Sebelum tes, peserta mengikuti seminar interaktif yang membahas peran bahasa Inggris, tips mengerjakan soal, 
                        strategi menjawab, hingga motivasi menjadi global citizen.
                    </p>
                </div>

                <!-- Card 4 -->
                <div class="bg-sage-100 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Gratis & Sertifikat Resmi</h3>
                    <p class="text-gray-700 text-center leading-relaxed">
                        PROTEIN 2025 tidak memungut biaya pendaftaran. Peserta yang menyelesaikan tes akan memperoleh 
                        e-certificate sebagai bukti kemampuan bahasa Inggris yang dapat digunakan untuk keperluan akademik maupun profesional.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    @include('components.protein-faq')
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