@extends('layouts.app')

@section('title', 'About-us')

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
    <div class="bg-gray-100 text-gray-800">      

        <!-- Hero Quote Section -->
        <section class="py-24 bg-gradient-to-br from-white via-gray-50 to-[#EAEFEF]/30 text-center relative overflow-hidden">
            <!-- Animated background elements -->
            <div class="absolute inset-0">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-r from-[#EAEFEF]/10 via-transparent to-[#B8CFCE]/10"></div>
                <div class="absolute top-20 left-1/4 w-40 h-40 bg-[#B8CFCE]/10 rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-32 right-1/3 w-32 h-32 bg-[#7F8CAA]/10 rounded-full blur-2xl animate-pulse delay-1000"></div>
                <div class="absolute top-1/2 left-10 w-20 h-20 bg-[#8794ba]/10 rounded-full blur-xl animate-pulse delay-500"></div>
            </div>
            
            <!-- Floating quote marks -->
            <div class="absolute top-16 left-1/2 transform -translate-x-1/2 text-6xl text-[#B8CFCE]/20 font-serif">"</div>
            <div class="absolute bottom-16 left-1/2 transform -translate-x-1/2 rotate-180 text-6xl text-[#B8CFCE]/20 font-serif">"</div>
            
            <div class="relative z-10 max-w-5xl mx-auto px-6">
                <!-- Main quote -->
                <div class="space-y-8">
                <div class="space-y-6">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight">
                    <span class="bg-gradient-to-r from-[#7F8CAA] via-[#8794ba] to-[#B8CFCE] bg-clip-text text-transparent block animate-gradient">
                        "Visi Protein.
                    </span>
                    <span class="bg-gradient-to-r from-[#B8CFCE] via-[#7F8CAA] to-[#8794ba] bg-clip-text text-transparent block mt-2 animate-gradient delay-300">
                        Lorem ipsum."
                    </span>
                    </h1>
                    
                    <!-- Decorative line -->
                    <div class="flex justify-center">
                    <div class="w-32 h-1 bg-gradient-to-r from-transparent via-[#7F8CAA] to-transparent rounded-full"></div>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="max-w-3xl mx-auto">
                    <p class="text-xl md:text-2xl text-gray-700 leading-relaxed font-light tracking-wide">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                </div>
                
                <!-- Floating elements -->
                <div class="absolute top-1/4 left-8 opacity-30">
                <div class="w-4 h-4 border-2 border-[#B8CFCE] rounded-full animate-bounce"></div>
                </div>
                <div class="absolute top-1/3 right-12 opacity-30">
                <div class="w-3 h-3 bg-[#7F8CAA] rounded-full animate-bounce delay-500"></div>
                </div>
                <div class="absolute bottom-1/4 left-16 opacity-30">
                <div class="w-2 h-2 bg-[#8794ba] rounded-full animate-bounce delay-1000"></div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-[#EAEFEF]/20 px-4 relative overflow-hidden">
            <!-- Background decorations -->
            <div class="absolute inset-0 opacity-5">
                <div class="absolute top-1/4 left-10 w-32 h-32 bg-[#B8CFCE] rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-1/3 right-20 w-24 h-24 bg-[#7F8CAA] rounded-full blur-2xl animate-pulse delay-700"></div>
            </div>
            
            <div class="max-w-7xl mx-auto relative z-10">
                <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Logo Section -->
                <div class="w-full lg:w-2/5 flex justify-center lg:justify-start">
                    <div class="relative group">
                    <!-- Animated background ring -->
                    <div class="absolute -inset-8 bg-gradient-to-r from-[#B8CFCE]/20 via-[#7F8CAA]/20 to-[#8794ba]/20 rounded-full blur-xl group-hover:blur-2xl transition-all duration-700 animate-pulse"></div>
                    
                    <!-- Main logo container -->
                    <div class="relative bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-2xl border border-[#B8CFCE]/30 group-hover:shadow-3xl transition-all duration-500">
                        <img src="{{ asset('img/about-us/logo.png') }}"
                            alt="Logo PROTEIN 2025" 
                            class="w-52 md:w-64 group-hover:scale-105 transition-all duration-500 filter drop-shadow-2xl">
                        
                        <!-- Floating particles -->
                        <div class="absolute top-4 right-4 w-2 h-2 bg-[#B8CFCE] rounded-full animate-ping"></div>
                        <div class="absolute bottom-6 left-6 w-1.5 h-1.5 bg-[#7F8CAA] rounded-full animate-ping delay-500"></div>
                        <div class="absolute top-1/2 left-4 w-1 h-1 bg-[#8794ba] rounded-full animate-ping delay-1000"></div>
                    </div>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="w-full lg:w-3/5 text-center lg:text-left space-y-8">
                    <!-- Header -->
                    <div class="space-y-4">
                    <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-[#8794ba] via-[#7F8CAA] to-[#B8CFCE] bg-clip-text text-transparent leading-tight">
                        We are PROTEIN!
                    </h2>
                    <div class="w-20 h-1 bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] rounded-full mx-auto lg:mx-0"></div>
                    </div>
                    
                    <!-- Main description -->
                    <div class="space-y-6">
                    <p class="text-gray-700 text-lg md:text-xl leading-relaxed font-medium">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                    </p>
                    
                    <!-- Logo meaning card -->
                    <div class="group relative">
                        <!-- Card background with gradient border -->
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-[#B8CFCE] via-[#7F8CAA] to-[#8794ba] rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-500"></div>
                        
                        <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-8 border border-[#B8CFCE]/20 group-hover:shadow-2xl transition-all duration-500">
                        <!-- Icon and title -->
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] rounded-lg flex items-center justify-center">
                            <span class="text-white text-sm font-bold">✨</span>
                            </div>
                            <h3 class="text-xl font-bold bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] bg-clip-text text-transparent">
                            Arti dari logo Protein
                            </h3>
                        </div>
                        
                        <!-- Description -->
                        <p class="text-gray-700 leading-relaxed text-lg">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                        </p>
                        
                        <!-- Decorative dots -->
                        <div class="absolute top-4 right-6 flex gap-1">
                            <div class="w-1.5 h-1.5 bg-[#B8CFCE]/40 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-[#7F8CAA]/40 rounded-full"></div>
                            <div class="w-1.5 h-1.5 bg-[#8794ba]/40 rounded-full"></div>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <!-- Additional info cards -->
                    <div class="grid md:grid-cols-2 gap-6 mt-8">
                    <div class="bg-gradient-to-br from-white/80 to-[#EAEFEF]/50 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center gap-3 mb-3">
                        <div class="w-6 h-6 bg-[#B8CFCE] rounded-full"></div>
                        <h4 class="font-semibold text-[#7F8CAA]">Visi Kami</h4>
                        </div>
                        <p class="text-gray-600 text-sm">Meningkatkan kemampuan bahasa Inggris mahasiswa</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-white/80 to-[#EAEFEF]/50 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                        <div class="flex items-center gap-3 mb-3">
                        <div class="w-6 h-6 bg-[#7F8CAA] rounded-full"></div>
                        <h4 class="font-semibold text-[#7F8CAA]">Target</h4>
                        </div>
                        <p class="text-gray-600 text-sm">Persiapan optimal untuk menghadapi USEPT</p>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>

        <!-- Mission Section -->
        <section class="py-16 bg-gradient-to-br from-[#EAEFEF] to-[#EAEFEF]/80 px-4">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] bg-clip-text text-transparent">
            Misi PROTEIN
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">

            <div class="bg-gradient-to-br from-[#B8CFCE] to-[#B8CFCE]/90 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                <div class="bg-white/20 rounded-full p-3 mb-4 mx-auto w-fit">
                <img src="https://static.thenounproject.com/png/graduation-cap-icon-2023633-512.png"
                    alt="Graduation Cap" class="h-12 w-12 object-contain opacity-80">
                </div>
                <p class="text-sm text-gray-800 font-medium leading-relaxed">Lorem ipsum dolor sit amet.</p>
            </div>

            <div class="bg-gradient-to-br from-[#B8CFCE] to-[#B8CFCE]/90 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                <div class="bg-white/20 rounded-full p-3 mb-4 mx-auto w-fit">
                <img src="https://static.thenounproject.com/png/education-book-icon-2551238-512.png"
                    alt="Open Book" class="h-12 w-12 object-contain opacity-80">
                </div>
                <p class="text-sm text-gray-800 font-medium leading-relaxed">Lorem ipsum dolor sit amet.</p>
            </div>

            <div class="bg-gradient-to-br from-[#B8CFCE] to-[#B8CFCE]/90 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                <div class="bg-white/20 rounded-full p-3 mb-4 mx-auto w-fit">
                <img src="https://static.thenounproject.com/png/monitor-icon-4534-512.png"
                    alt="Monitor" class="h-12 w-12 object-contain opacity-80">
                </div>
                <p class="text-sm text-gray-800 font-medium leading-relaxed">Lorem ipsum dolor sit amet.</p>
            </div>

            <div class="bg-gradient-to-br from-[#B8CFCE] to-[#B8CFCE]/90 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                <div class="bg-white/20 rounded-full p-3 mb-4 mx-auto w-fit">
                <img src="https://static.thenounproject.com/png/headset-icon-388920-512.png"
                    alt="Headset" class="h-12 w-12 object-contain opacity-80">
                </div>
                <p class="text-sm text-gray-800 font-medium leading-relaxed">Lorem ipsum dolor sit amet.</p>
            </div>

            <div class="bg-gradient-to-br from-[#B8CFCE] to-[#B8CFCE]/90 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                <div class="bg-white/20 rounded-full p-3 mb-4 mx-auto w-fit">
                <img src="https://static.thenounproject.com/png/book-icon-16437-512.png"
                    alt="Notebook" class="h-12 w-12 object-contain opacity-80">
                </div>
                <p class="text-sm text-gray-800 font-medium leading-relaxed">Lorem ipsum dolor sit amet.</p>
            </div>

            <div class="bg-gradient-to-br from-[#B8CFCE] to-[#B8CFCE]/90 p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 border border-white/20">
                <div class="bg-white/20 rounded-full p-3 mb-4 mx-auto w-fit">
                <img src="https://static.thenounproject.com/png/stopwatch-icon-1085985-512.png"
                    alt="Stopwatch" class="h-12 w-12 object-contain opacity-80">
                </div>
                <p class="text-sm text-gray-800 font-medium leading-relaxed">Lorem ipsum dolor sit amet.</p>
            </div>

            </div>
        </div>
        </section>

        <!-- Timeline Section -->
        <section class="py-16 bg-gradient-to-br from-white to-[#EAEFEF]/30 px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] bg-clip-text text-transparent">
                TIMELINE PROTEIN 2025
                </h2>
                
                <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-[#B8CFCE] to-[#7F8CAA] rounded-full"></div>
                
                <!-- Timeline Items -->
                <div class="space-y-12">
                    <!-- Timeline Item 1 -->
                    <div class="flex items-center">
                    <div class="w-1/2 pr-8 text-right">
                        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-[#B8CFCE]/30 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-lg font-bold text-[#7F8CAA] mb-2">Pendaftaran Dibuka</h3>
                        <p class="text-gray-700 text-sm mb-2">1 - 15 Agustus 2025</p>
                        <p class="text-gray-600 text-sm">Pendaftaran peserta PROTEIN 2025 dibuka untuk seluruh mahasiswa Universitas Sriwijaya</p>
                        </div>
                    </div>
                    <div class="relative flex items-center justify-center w-8 h-8 bg-gradient-to-r from-[#B8CFCE] to-[#7F8CAA] rounded-full border-4 border-white shadow-lg z-10">
                        <div class="w-3 h-3 bg-white rounded-full"></div>
                    </div>
                    <div class="w-1/2 pl-8"></div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="flex items-center">
                    <div class="w-1/2 pr-8"></div>
                    <div class="relative flex items-center justify-center w-8 h-8 bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] rounded-full border-4 border-white shadow-lg z-10">
                        <div class="w-3 h-3 bg-white rounded-full"></div>
                    </div>
                    <div class="w-1/2 pl-8">
                        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-[#B8CFCE]/30 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-lg font-bold text-[#7F8CAA] mb-2">Technical Meeting</h3>
                        <p class="text-gray-700 text-sm mb-2">20 Agustus 2025</p>
                        <p class="text-gray-600 text-sm">Briefing dan penjelasan teknis mengenai pelaksanaan PROTEIN 2025</p>
                        </div>
                    </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="flex items-center">
                    <div class="w-1/2 pr-8 text-right">
                        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-[#B8CFCE]/30 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-lg font-bold text-[#7F8CAA] mb-2">Pelaksanaan PROTEIN</h3>
                        <p class="text-gray-700 text-sm mb-2">23 Agustus 2025</p>
                        <p class="text-gray-600 text-sm">Hari pelaksanaan test simulasi TOEFL/USEPT untuk seluruh peserta</p>
                        </div>
                    </div>
                    <div class="relative flex items-center justify-center w-8 h-8 bg-gradient-to-r from-[#8794ba] to-[#B8CFCE] rounded-full border-4 border-white shadow-lg z-10">
                        <div class="w-3 h-3 bg-white rounded-full"></div>
                    </div>
                    <div class="w-1/2 pl-8"></div>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="flex items-center">
                    <div class="w-1/2 pr-8"></div>
                    <div class="relative flex items-center justify-center w-8 h-8 bg-gradient-to-r from-[#B8CFCE] to-[#7F8CAA] rounded-full border-4 border-white shadow-lg z-10">
                        <div class="w-3 h-3 bg-white rounded-full"></div>
                    </div>
                    <div class="w-1/2 pl-8">
                        <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-[#B8CFCE]/30 hover:shadow-xl transition-all duration-300">
                        <h3 class="text-lg font-bold text-[#7F8CAA] mb-2">Pengumuman Hasil</h3>
                        <p class="text-gray-700 text-sm mb-2">25 Agustus 2025</p>
                        <p class="text-gray-600 text-sm">Pengumuman hasil dan pemberian sertifikat kepada peserta</p>
                        </div>
                    </div>
                    </div>
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
    </div>
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