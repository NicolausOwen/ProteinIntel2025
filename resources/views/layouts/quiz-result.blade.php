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
    </nav>

    <main>
        {{-- content --}}
        @yield('container')
        <form id="autoSubmitForm" method="POST" style="display: none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @stack('scripts')

    <script>
        const QUIZ_REMAINING = {{ $remaining ?? 0 }}; // dalam detik dari server

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
        }

        document.addEventListener('DOMContentLoaded', function () {
            window.quizTimer = new QuizTimer();
        });
    </script>

</body>

</html>