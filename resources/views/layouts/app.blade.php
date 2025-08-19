<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <title>@yield('title') - {{ config('app.name', 'INTEL-PROTEIN-2025') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }
        .font-title {
            font-family: 'Playfair Display', serif;
        }
    </style>

    {{-- Page-specific styles (Optional)--}}
    @stack('styles')
</head>

<body class="bg-white overflow-x-hidden">

    {{-- Enhanced Modal Flash Message --}}
    @if(session('message'))
        <div 
            x-data="{ open: true }" 
            x-show="open" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 flex items-center justify-center bg-black/60 backdrop-blur-sm z-50 p-4"
            @keydown.escape.window="open = false"
        >
            <div 
                x-show="open"
                x-transition:enter="transition ease-out duration-300 transform"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200 transform"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-4"
                class="bg-white rounded-2xl shadow-2xl border border-gray-100 p-8 max-w-md w-full relative overflow-hidden"
                @click.away="open = false"
            >
                {{-- Decorative gradient background --}}
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>
                
                {{-- Close button --}}
                <button 
                    @click="open = false" 
                    class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-gray-100 hover:bg-gray-200 text-gray-500 hover:text-gray-700 transition-all duration-200 group"
                >
                    <svg class="w-4 h-4 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>

                {{-- Icon --}}
                <div class="w-12 h-12 mx-auto mb-4 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>

                {{-- Title --}}
                <h2 class="text-xl font-bold text-gray-800 mb-3 text-center">Information</h2>
                
                {{-- Message --}}
                <p class="text-gray-600 text-center leading-relaxed mb-6">{{ session('message') }}</p>

                {{-- Action button --}}
                <div class="flex justify-center">
                    <a 
                        href="{{ route('filament.user.pages.dashboard') }}"
                        class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-blue-300 inline-block text-center"
                    >
                        Return to Dashboard
                    </a>
                </div>
            </div>
        </div>
    @endif

    <div class="relative bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] min-h-screen w-full z-10">
        <header>
            {{-- Navbar --}}
            @include('components.navbar')
        </header>
        {{-- Page content --}}
        <main>            
            @yield('content')
        </main>
    </div>

    {{-- Footer --}}
    @includeIf('components.footer')

    {{-- Page-specific scripts --}}
    @stack('scripts')

    <script>
        const navbar = document.getElementById('main-navbar');
        let scrollTimeout;
        let isMouseAtTop = false;

        function showNavbar() {
            navbar.classList.add('translate-y-0');
            navbar.classList.remove('-translate-y-full');
        }

        function hideNavbar() {
            if (!isMouseAtTop) {
                navbar.classList.add('-translate-y-full');
                navbar.classList.remove('translate-y-0');
            }
        }

        // Scroll styling effect
        function handleScrollStyle() {
            if (window.scrollY === 0) {
                navbar.classList.remove('scrolled');
                navbar.style.backgroundColor = 'transparent';
                navbar.style.padding = '20px 0';
            } else {
                navbar.classList.add('scrolled');
                navbar.style.backgroundColor = '#333446';
                navbar.style.padding = '10px 0';
            }
        }

        window.addEventListener('scroll', () => {
            showNavbar();
            clearTimeout(scrollTimeout);
            // scrollTimeout = setTimeout(() => hideNavbar(), 2000);

            handleScrollStyle();
        });

        document.addEventListener('mousemove', (e) => {
            if (e.clientY <= 20) {
                isMouseAtTop = true;
                showNavbar();
            } else {
                isMouseAtTop = false;
                clearTimeout(scrollTimeout);
                // scrollTimeout = setTimeout(() => hideNavbar(), 500);
            }
        });

        // window.addEventListener('load', () => {
        //     scrollTimeout = setTimeout(() => hideNavbar(), 2000);
        //     handleScrollStyle();
        // });
    </script>

</body>
</html>
