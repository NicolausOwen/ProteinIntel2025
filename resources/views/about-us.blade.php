@extends('layouts.app')

@section('title', 'About-us')

@push('styles')
    <style>
        @keyframes blob {
        0%   { transform: translate(0px, 0px) scale(1); }
        33%  { transform: translate(30px, -50px) scale(1.1); }
        66%  { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
        }
        .animate-blob {
        animation: blob 20s infinite;
        }
        .animate-blob-slow {
        animation: blob 30s infinite;
        }
        .animate-blob-fast {
        animation: blob 15s infinite;
        }
    </style>
@endpush

@section('content')

    <!-- Hero Section -->
    <section class="relative py-28 text-center overflow-hidden">
        <!-- Lava Lamp Background -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Blob 1 -->
            <div class="absolute -top-32 -left-32 w-[40rem] h-[40rem] 
                bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 
                rounded-full blur-[120px] opacity-60 animate-blob"></div>
            <!-- Blob 2 -->
            <div class="absolute top-1/2 -right-32 w-[35rem] h-[35rem] 
                bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500 
                rounded-full blur-[120px] opacity-60 animate-blob-slow"></div>
            <!-- Blob 3 -->
            <div class="absolute bottom-0 left-1/3 w-[30rem] h-[30rem] 
                bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 
                rounded-full blur-[100px] opacity-50 animate-blob-fast"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-4xl mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight">
                <span class="font-title block bg-gradient-to-r from-slate-800 via-slate-700 to-slate-900 bg-clip-text text-transparent drop-shadow-sm">
                    "Speak the World.
                </span>
                <span class="font-title block text-gray-100 mt-2">
                    Empowering Global Citizens through English."
                </span>
            </h1>

            <!-- Garis dekoratif -->
            <div class="flex justify-center mt-6">
                <div class="w-32 h-1 bg-gray-100 rounded-full"></div>
            </div>

            <!-- Deskripsi -->
            <p class="mt-8 text-lg md:text-xl text-gray-200 leading-relaxed font-light tracking-wide">
                PROTEIN 2025 adalah program simulasi tes TOEFL/SULIET yang dirancang oleh Fakultas Ilmu Komputer Universitas Sriwijaya.
                Melalui seminar strategi dan tes simulasi lengkap, PROTEIN membantu mahasiswa meningkatkan kemampuan bahasa Inggris,
                membangun kepercayaan diri, dan membuka peluang untuk studi, beasiswa, dan karier internasional.
            </p>
        </div>

    </section>

    <!-- About Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 via-white to-[#EAEFEF]/20 px-4 relative overflow-hidden">
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Logo -->
                <div class="w-full lg:w-2/5 flex justify-center lg:justify-start">
                    <div class="relative group">
                        <div class="absolute -inset-8 bg-gradient-to-r from-[#B8CFCE]/20 via-[#7F8CAA]/20 to-[#8794ba]/20 rounded-full blur-xl group-hover:blur-2xl transition-all duration-700 animate-pulse"></div>
                        <div class="relative bg-white/80 backdrop-blur-lg rounded-3xl p-8 shadow-2xl border border-[#B8CFCE]/30 group-hover:shadow-3xl transition-all duration-500">
                            <img src="{{ asset('img/about-us/logo.png') }}" alt="Logo PROTEIN 2025" class="w-52 md:w-64 group-hover:scale-105 transition-all duration-500 filter drop-shadow-2xl">
                        </div>
                    </div>
                </div>

                <!-- Content -->
                <div class="w-full lg:w-3/5 text-center lg:text-left space-y-8">
                    <div class="space-y-4">
                        <h2 class="font-title text-4xl md:text-5xl font-bold bg-gradient-to-r from-[#8794ba] via-[#7F8CAA] to-[#B8CFCE] bg-clip-text text-transparent leading-tight">
                            We are PROTEIN!
                        </h2>
                        <div class="w-20 h-1 bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] rounded-full mx-auto lg:mx-0"></div>
                    </div>

                    <p class="text-gray-700 text-lg md:text-xl leading-relaxed font-medium">
                        Kami adalah tim dari Fakultas Ilmu Komputer Universitas Sriwijaya yang berkomitmen untuk meningkatkan kompetensi bahasa Inggris mahasiswa melalui pelatihan dan simulasi tes TOEFL/SULIET yang komprehensif.
                    </p>

                    <div class="group relative">
                        <div class="absolute -inset-0.5 bg-gradient-to-r from-[#B8CFCE] via-[#7F8CAA] to-[#8794ba] rounded-2xl blur opacity-30 group-hover:opacity-50 transition duration-500"></div>
                        <div class="relative bg-white/90 backdrop-blur-xl rounded-2xl p-8 border border-[#B8CFCE]/20 group-hover:shadow-2xl transition-all duration-500">
                            <div class="flex items-center gap-3 mb-4">
                                <div class="w-8 h-8 bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] rounded-lg flex items-center justify-center">
                                    <span class="text-white text-sm font-bold">✨</span>
                                </div>
                                <h3 class="text-xl font-bold bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] bg-clip-text text-transparent">
                                    Filosofi Logo PROTEIN
                                </h3>
                            </div>
                            <p class="text-gray-700 leading-relaxed text-lg">
                                Logo PROTEIN merepresentasikan semangat global, kemajuan, dan kolaborasi. Warna-warna lembut melambangkan keterbukaan dan inklusivitas, sedangkan bentuk dinamis mencerminkan adaptasi dan kesiapan menghadapi tantangan internasional.
                            </p>
                        </div>
                    </div>

                    <!-- Visi & Target -->
                    <div class="grid md:grid-cols-2 gap-6 mt-8">
                        <div class="bg-gradient-to-br from-white/80 to-[#EAEFEF]/50 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                            <h4 class="font-semibold text-[#7F8CAA] mb-2">Visi Kami</h4>
                            <p class="text-gray-600 text-sm">Meningkatkan kemampuan bahasa Inggris mahasiswa untuk memperluas kesempatan akademik dan profesional di tingkat global.</p>
                        </div>
                        <div class="bg-gradient-to-br from-white/80 to-[#EAEFEF]/50 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                            <h4 class="font-semibold text-[#7F8CAA] mb-2">Target</h4>
                            <p class="text-gray-600 text-sm">Memberikan pengalaman simulasi TOEFL/SULIET yang realistis dan seminar strategi persiapan yang efektif.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!-- Mission Section -->
    <section class="py-16 bg-gradient-to-br from-[#EAEFEF] to-[#EAEFEF]/80 px-4">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="font-title text-3xl md:text-4xl font-bold mb-12 bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] bg-clip-text text-transparent">
                Misi PROTEIN
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                
                <!-- Card 1 -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] text-white mb-4">
                        <!-- Target Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm">Menyediakan simulasi tes TOEFL/SULIET yang mencakup Listening, Structure, dan Reading.</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] text-white mb-4">
                        <!-- Book Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m8-6H4"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm">Memberikan seminar strategi sukses TOEFL/SULIET dari narasumber berpengalaman.</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] text-white mb-4">
                        <!-- Light Bulb Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2a7 7 0 00-7 7c0 2.667 1.333 4.667 4 6v2a3 3 0 006 0v-2c2.667-1.333 4-3.333 4-6a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm">Meningkatkan kepercayaan diri mahasiswa dalam menggunakan bahasa Inggris.</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] text-white mb-4">
                        <!-- Globe Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm">Membuka peluang beasiswa, studi, dan karier internasional bagi peserta.</p>
                </div>

                <!-- Card 5 -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] text-white mb-4">
                        <!-- Document Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h10M7 11h10M7 15h6"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm">Memberikan umpan balik hasil tes dan sertifikat resmi.</p>
                </div>

                <!-- Card 6 -->
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="w-12 h-12 mx-auto flex items-center justify-center rounded-full bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] text-white mb-4">
                        <!-- Handshake Icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12l-2-2m0 0l-2 2m2-2h12m-2 2l2-2m-2 2l-2-2"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm">Mendorong kolaborasi dan berbagi pengalaman antar peserta.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-16 bg-gradient-to-br from-white to-gray-50 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="font-title text-3xl md:text-4xl font-bold text-center mb-12 bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] bg-clip-text text-transparent">
                Timeline PROTEIN 2025
            </h2>

            <div class="relative border-l border-[#B8CFCE] pl-8 space-y-10">
                <!-- 1 -->
                <div>
                    <div class="absolute -left-4 top-0 w-8 h-8 bg-[#7F8CAA] rounded-full border-4 border-white"></div>
                    <h3 class="text-xl font-bold text-[#7F8CAA]">Registrasi Peserta</h3>
                    <p class="text-gray-600 text-sm">1 – 15 Maret 2025</p>
                </div>
                <!-- 2 -->
                <div>
                    <div class="absolute -left-4 top-0 w-8 h-8 bg-[#7F8CAA] rounded-full border-4 border-white"></div>
                    <h3 class="text-xl font-bold text-[#7F8CAA]">Seminar TOEFL Strategies</h3>
                    <p class="text-gray-600 text-sm">22 Maret 2025</p>
                </div>
                <!-- 3 -->
                <div>
                    <div class="absolute -left-4 top-0 w-8 h-8 bg-[#7F8CAA] rounded-full border-4 border-white"></div>
                    <h3 class="text-xl font-bold text-[#7F8CAA]">Pelaksanaan Try Out PROTEIN</h3>
                    <p class="text-gray-600 text-sm">29 – 30 Maret 2025</p>
                </div>
                <!-- 4 -->
                <div>
                    <div class="absolute -left-4 top-0 w-8 h-8 bg-[#7F8CAA] rounded-full border-4 border-white"></div>
                    <h3 class="text-xl font-bold text-[#7F8CAA]">Pengumuman Hasil</h3>
                    <p class="text-gray-600 text-sm">5 April 2025</p>
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
