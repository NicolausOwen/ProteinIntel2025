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
        const QUIZ_DATA = @json(session('quiz_data'));
        const QUIZ_DURATION_MINUTES = QUIZ_DATA ? QUIZ_DATA.duration_minutes : 0;

        class QuizTimer {
            constructor() {
                // Safely get elements with null checks
                this.timerElement = document.getElementById('timer');
                this.statusElement = document.getElementById('status');
                this.interval = null;
                this.beforeUnloadHandler = null;

                // Only initialize if required elements exist
                if (this.timerElement) {
                    this.init();
                } else {
                    console.warn('Timer element not found. QuizTimer will not initialize.');
                }
            }

            init() {
                // Validate QUIZ_DATA exists
                if (!QUIZ_DATA || !QUIZ_DATA.duration_minutes) {
                    console.error('Quiz data not available');
                    if (this.timerElement) {
                        this.timerElement.textContent = 'N/A';
                    }
                    if (this.statusElement) {
                        this.statusElement.textContent = 'Data tidak tersedia';
                    }
                    return;
                }

                // Cek apakah quiz sudah dimulai sebelumnya
                const startTime = localStorage.getItem('quiz_start_time');
                const duration = localStorage.getItem('quiz_duration');

                if (startTime && duration) {
                    // Resume timer
                    this.resumeTimer(parseInt(startTime), parseInt(duration));
                } else {
                    // Belum dimulai
                    this.timerElement.textContent = QUIZ_DURATION_MINUTES + ':00';
                    if (this.statusElement) {
                        this.statusElement.textContent = 'Belum dimulai';
                    }
                }
            }

            start(durationMinutes) {
                if (!this.timerElement) {
                    console.error('Timer element not available');
                    return;
                }

                // Simpan waktu mulai dan durasi ke localStorage
                const startTime = Date.now();
                const duration = durationMinutes * 60 * 1000;

                localStorage.setItem('quiz_start_time', startTime);
                localStorage.setItem('quiz_duration', duration);
                localStorage.setItem('quiz_active', 'true');

                this.startCountdown(startTime, duration);

                if (this.statusElement) {
                    this.statusElement.textContent = 'Aktif';
                }

                // Safely access optional elements
                const sectionsEl = document.getElementById('sections');
                const startBtnEl = document.getElementById('startBtn');
                const quizStatusEl = document.getElementById('quizStatus');

                if (sectionsEl) sectionsEl.style.display = 'grid';
                if (startBtnEl) startBtnEl.style.display = 'none';
                if (quizStatusEl) quizStatusEl.textContent = 'Sedang Berjalan';
            }

            resumeTimer(startTime, duration) {
                if (!this.timerElement) return;

                const elapsed = Date.now() - startTime;
                const remaining = duration - elapsed;

                if (remaining <= 0) {
                    this.expired();
                    return;
                }

                this.startCountdown(startTime, duration);

                if (this.statusElement) {
                    this.statusElement.textContent = 'Aktif';
                }

                // Safely access optional elements
                const sectionsEl = document.getElementById('sections');
                const startBtnEl = document.getElementById('startBtn');
                const quizStatusEl = document.getElementById('quizStatus');

                if (sectionsEl) sectionsEl.style.display = 'grid';
                if (startBtnEl) startBtnEl.style.display = 'none';
                if (quizStatusEl) quizStatusEl.textContent = 'Sedang Berjalan';
            }

            startCountdown(startTime, duration) {
                if (!this.timerElement) return;

                this.interval = setInterval(() => {
                    const elapsed = Date.now() - startTime;
                    const remaining = duration - elapsed;

                    if (remaining <= 0) {
                        this.expired();
                        return;
                    }

                    this.updateDisplay(remaining);
                }, 1000);
            }

            updateDisplay(remainingMs) {
                if (!this.timerElement) return;

                const minutes = Math.floor(remainingMs / (1000 * 60));
                const seconds = Math.floor((remainingMs % (1000 * 60)) / 1000);

                const display = `${minutes}:${seconds.toString().padStart(2, '0')}`;
                this.timerElement.textContent = display;

                // Warning jika kurang dari 5 menit
                if (minutes < 5) {
                    this.timerElement.className = 'timer warning';
                } else {
                    this.timerElement.className = 'timer';
                }
            }

            addBeforeUnloadWarning() {
                if (!this.beforeUnloadHandler) {
                    this.beforeUnloadHandler = (e) => {
                        e.preventDefault();
                        e.returnValue = 'Quiz sedang berjalan. Yakin ingin keluar?';
                    };
                    window.addEventListener('beforeunload', this.beforeUnloadHandler);
                }
            }

            removeBeforeUnloadWarning() {
                if (this.beforeUnloadHandler) {
                    window.removeEventListener('beforeunload', this.beforeUnloadHandler);
                    this.beforeUnloadHandler = null;
                }
            }

            expired() {
                if (!this.timerElement) return;

                clearInterval(this.interval);
                this.timerElement.textContent = '0:00';
                this.timerElement.className = 'timer expired';

                if (this.statusElement) {
                    this.statusElement.textContent = 'Waktu Habis!';
                }

                // Auto submit quiz
                this.removeBeforeUnloadWarning();
                this.autoSubmit();
            }

            autoSubmit() {
                localStorage.removeItem('quiz_start_time');
                localStorage.removeItem('quiz_duration');
                localStorage.removeItem('quiz_active');

                const form = document.getElementById('autoSubmitForm');
                if (form && QUIZ_DATA && QUIZ_DATA.attempt_id) {
                    form.action = '/user/attempt/' + QUIZ_DATA.attempt_id + '/submit';
                    form.submit();
                } else {
                    console.error('Auto submit form or attempt_id not found');
                }
            }

            // Static methods remain the same but with additional safety checks
            static isActive() {
                const startTime = localStorage.getItem('quiz_start_time');
                const duration = localStorage.getItem('quiz_duration');
                const active = localStorage.getItem('quiz_active');

                if (!startTime || !duration || active !== 'true') {
                    return false;
                }

                const elapsed = Date.now() - parseInt(startTime);
                const remaining = parseInt(duration) - elapsed;

                return remaining > 0;
            }

            static getRemainingTime() {
                const startTime = parseInt(localStorage.getItem('quiz_start_time'));
                const duration = parseInt(localStorage.getItem('quiz_duration'));

                if (!startTime || !duration) return 0;

                const elapsed = Date.now() - startTime;
                return Math.max(0, duration - elapsed);
            }
        }

        // Safe initialization - wait for DOM to be ready
        document.addEventListener('DOMContentLoaded', function () {
            // Only initialize if QUIZ_DATA is available
            if (typeof QUIZ_DATA !== 'undefined' && QUIZ_DATA) {
                window.quizTimer = new QuizTimer();
            } else {
                console.warn('QUIZ_DATA not available, timer not initialized');
            }
        });

        function startQuiz() {
            quizTimer.start(QUIZ_DURATION_MINUTES);
        }

        function goToSection(sectionId) {
            alert(`Pindah ke Section ${sectionId}\n\nTimer akan tetap berjalan di background!`);

            // window.location.href = `/quiz/section/${sectionId}`;
        }
    </script>
</body>

</html>