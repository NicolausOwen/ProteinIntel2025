<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{ config('app.name', 'INTEL-PROTEIN-2025') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    {{-- Page-specific styles (Optional)--}}
    @stack('styles')
</head>

<body class="bg-white">

    <header>
        {{-- Navbar --}}
        @include('components.navbar')
    </header>

    {{-- Page content --}}
    <main>
        @yield('content')
    </main>

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
            // Only hide if the mouse is NOT at the top
            if (!isMouseAtTop) {
                navbar.classList.add('-translate-y-full');
                navbar.classList.remove('translate-y-0');
            }
        }

        // Handle scroll events
        window.addEventListener('scroll', () => {
            showNavbar();
            clearTimeout(scrollTimeout);

            scrollTimeout = setTimeout(() => {
                hideNavbar();
            }, 2000);
        });

        // Handle mouse hover at top
        document.addEventListener('mousemove', (e) => {
            if (e.clientY <= 20) {
                isMouseAtTop = true;
                showNavbar();
            } else {
                isMouseAtTop = false;

                // If user not scrolling either, hide navbar
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(() => {
                    hideNavbar();
                }, 500); // quick hide after mouse moves away
            }
        });

        // Initial idle hide after page load
        window.addEventListener('load', () => {
            scrollTimeout = setTimeout(() => {
                hideNavbar();
            }, 2000);
        });
    </script>

</body>
</html>
