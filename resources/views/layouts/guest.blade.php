<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Tailwind -->
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

    @stack('styles')
</head>
<body class="bg-gradient-to-r from-[#7F8CAA] to-[#B8CFCE] flex items-center justify-center min-h-screen px-4">
    <!-- Lava Lamp Background -->
        <div class="absolute inset-0 overflow-hidden">
            <!-- Ellipse 1 -->
            <div class="absolute -top-32 -left-32 w-[40rem] h-[40rem] bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 rounded-full blur-[120px] opacity-70 animate-lava"></div>
            <!-- Ellipse 2 -->
            <div class="absolute top-1/2 -right-32 w-[35rem] h-[35rem] bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500 rounded-full blur-[120px] opacity-70 animate-lava-slow"></div>
            <!-- Ellipse 3 -->
            <div class="absolute bottom-0 left-1/3 w-[30rem] h-[30rem] bg-gradient-to-r from-yellow-400 via-orange-500 to-pink-500 rounded-full blur-[100px] opacity-60 animate-lava-fast"></div>
        </div>  

    <!-- Container utama -->
    <div class="flex flex-col md:flex-row w-full max-w-4xl shadow-lg rounded overflow-hidden z-50">
        {{ $slot }}
    </div>

    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const icon = document.getElementById(fieldId + 'Icon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
