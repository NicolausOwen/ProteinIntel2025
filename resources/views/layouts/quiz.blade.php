<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <title>Quiz - {{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 20px;
            font-weight: bold;
        }

        .timer-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .timer {
            background: rgba(255, 255, 255, 0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: bold;
            border: 1px solid rgba(255, 255, 255, 0.3);
            min-width: 80px;
            text-align: center;
        }

        .timer.warning {
            background: #ff6b35;
            animation: pulse 1s infinite;
        }

        .timer.expired {
            background: #e74c3c;
            animation: pulse 0.5s infinite;
        }
    </style>

    @stack('styles')

    {{-- conditional style --}}
    {{-- @if ( $assets === "home" )
    <link href=" {{ asset('assets/css/custom/button-mandiri.css') }}" rel="stylesheet">
    @elseif ( $assets === "profiles" )
    <link href=" {{ asset('assets/css/custom/profiles.css') }}" rel="stylesheet">
    @elseif ( $assets === "login" || $assets === "admin" )
    <link href=" {{ asset('assets/css/custom/login.css') }}" rel="stylesheet">
    @elseif ( $assets === "register" )
    <link href=" {{ asset('assets/css/custom/register.css') }}" rel="stylesheet">
    @elseif ( $assets === "market" )
    <link href=" {{ asset('assets/css/custom/market.css') }}" rel="stylesheet">
    @endif --}}

</head>

<body class="main-body">

    {{-- navbar --}}
    <nav class="navbar">
        <div class="logo"><a href="{{ route('filament.user.pages.dashboard') }}">PROTEIN 2025</a></div>
        <div class="timer-container">
            <div class="timer" id="timer">--:--</div>
            <div class="status" id="status">Belum dimulai</div>
        </div>

         @if(request()->is('user/attempt/*/section/2/*') && isset($question) && $question->audio_url)
            <div 
                x-data="{ open: true }" 
                x-show="open" 
                x-cloak
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
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500"></div>
                    
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
                    <div class="w-12 h-12 mx-auto mb-4 bg-gradient-to-br from-yellow-400 to-red-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>

                    {{-- Title --}}
                    <h2 class="text-xl font-bold text-gray-800 mb-3 text-center">⚠️ Listening Section</h2>
                    
                    {{-- Message --}}
                    <p class="text-gray-600 text-center leading-relaxed mb-6">
                        Please listen to each audio <strong>only once</strong>.  
                        Do not play multiple audios at the same time.
                    </p>

                    {{-- Action button --}}
                    <div class="flex justify-center">
                        <button 
                            @click="open = false"
                            class="bg-gradient-to-r from-yellow-500 to-red-500 hover:from-yellow-600 hover:to-red-600 text-white font-semibold px-6 py-3 rounded-lg transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-red-300 inline-block text-center"
                        >
                            I Understand
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </nav>

    <main>
        {{-- content --}}
        @yield('container')
        <form id="autoSubmitForm" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('scripts')

    <script>
        const QUIZ_REMAINING = {{ $remaining ?? 0 }};

        class QuizTimer {
            constructor() {
                this.timerElement = document.getElementById('timer');
                this.statusElement = document.getElementById('status');
                this.interval = null;

                if (this.timerElement) {
                    this.init();
                }
            }

            init() {
                if (!QUIZ_REMAINING || QUIZ_REMAINING <= 0) {
                    this.expired();
                    return;
                }

                this.startCountdown(QUIZ_REMAINING * 1000);

                if (this.statusElement) {
                    this.statusElement.textContent = 'Aktif';
                }
            }

            startCountdown(durationMs) {
                let remaining = durationMs;

                this.interval = setInterval(() => {
                    remaining -= 1000;

                    if (remaining <= 0) {
                        this.expired();
                        return;
                    }

                    this.updateDisplay(remaining);
                }, 1000);
            }

            updateDisplay(remainingMs) {
                const minutes = Math.floor(remainingMs / (1000 * 60));
                const seconds = Math.floor((remainingMs % (1000 * 60)) / 1000);

                const display = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                this.timerElement.textContent = display;

                if (minutes < 5) {
                    this.timerElement.className = 'timer warning';
                } else {
                    this.timerElement.className = 'timer';
                }
            }

            expired() {
                clearInterval(this.interval);
                this.timerElement.textContent = '0:00';
                this.timerElement.className = 'timer expired';
                if (this.statusElement) {
                    this.statusElement.textContent = 'Waktu Habis!';
                }

                this.autoSubmit();
            }

            autoSubmit() {
                const form = document.getElementById('autoSubmitForm');
                if (form && {{ $attempt->id }}) {
                    form.action = '/user/attempt/' + {{ $attempt->id }} + '/submit';
                    form.submit();
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            window.quizTimer = new QuizTimer();
        });
    </script>

</body>

</html>