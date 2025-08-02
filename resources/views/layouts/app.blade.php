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

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Page content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @includeIf('components.footer')

    {{-- Page-specific scripts --}}
    @stack('scripts')

</body>
</html>
