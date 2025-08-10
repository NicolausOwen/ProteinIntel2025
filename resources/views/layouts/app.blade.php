<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - {{ config('app.name', 'INTEL-PROTEIN-2025') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{-- Page-specific styles (Optional)--}}
    @stack('styles')
</head>

<body class="bg-white overflow-x-hidden">

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
