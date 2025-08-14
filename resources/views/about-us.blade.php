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
        <!-- Background decoration -->
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
            <div class="space-y-8">
                <div class="space-y-6">
                    <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight">
                        <span class="bg-gradient-to-r from-[#7F8CAA] via-[#8794ba] to-[#B8CFCE] bg-clip-text text-transparent block animate-gradient">
                            "Speak the World.
                        </span>
                        <span class="bg-gradient-to-r from-[#B8CFCE] via-[#7F8CAA] to-[#8794ba] bg-clip-text text-transparent block mt-2 animate-gradient delay-300">
                            Empowering Global Citizens through English."
                        </span>
                    </h1>
                    <div class="flex justify-center">
                        <div class="w-32 h-1 bg-gradient-to-r from-transparent via-[#7F8CAA] to-transparent rounded-full"></div>
                    </div>
                </div>

                <div class="max-w-3xl mx-auto">
                    <p class="text-xl md:text-2xl text-gray-700 leading-relaxed font-light tracking-wide">
                        PROTEIN 2025 adalah program simulasi tes TOEFL/SULIET yang dirancang oleh Fakultas Ilmu Komputer Universitas Sriwijaya.
                        Melalui seminar strategi dan tes simulasi lengkap, PROTEIN membantu mahasiswa meningkatkan kemampuan bahasa Inggris,
                        membangun kepercayaan diri, dan membuka peluang untuk studi, beasiswa, dan karier internasional.
                    </p>
                </div>
            </div>
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
                        <h2 class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-[#8794ba] via-[#7F8CAA] to-[#B8CFCE] bg-clip-text text-transparent leading-tight">
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
            <h2 class="text-3xl md:text-4xl font-bold mb-12 bg-gradient-to-r from-[#7F8CAA] to-[#8794ba] bg-clip-text text-transparent">
                Misi PROTEIN
            </h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl mb-4">🎯</div>
                    <p class="text-gray-600 text-sm">Menyediakan simulasi tes TOEFL/SULIET yang mencakup Listening, Structure, dan Reading.</p>
                </div>
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl mb-4">📚</div>
                    <p class="text-gray-600 text-sm">Memberikan seminar strategi sukses TOEFL/SULIET dari narasumber berpengalaman.</p>
                </div>
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl mb-4">💡</div>
                    <p class="text-gray-600 text-sm">Meningkatkan kepercayaan diri mahasiswa dalam menggunakan bahasa Inggris.</p>
                </div>
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl mb-4">🌍</div>
                    <p class="text-gray-600 text-sm">Membuka peluang beasiswa, studi, dan karier internasional bagi peserta.</p>
                </div>
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl mb-4">📝</div>
                    <p class="text-gray-600 text-sm">Memberikan umpan balik hasil tes dan sertifikat resmi.</p>
                </div>
                <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 border border-[#B8CFCE]/20 hover:shadow-lg transition-all duration-300">
                    <div class="text-3xl mb-4">🤝</div>
                    <p class="text-gray-600 text-sm">Mendorong kolaborasi dan berbagi pengalaman antar peserta.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="py-16 bg-gradient-to-br from-white to-gray-50 px-4">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] bg-clip-text text-transparent">
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
</div>
@endsection
