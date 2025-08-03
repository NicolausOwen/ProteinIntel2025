<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>quiz</title>
      <style>
        .navbar {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
            background: rgba(255,255,255,0.2);
            padding: 8px 16px;
            border-radius: 20px;
            font-family: 'Courier New', monospace;
            font-size: 18px;
            font-weight: bold;
            border: 1px solid rgba(255,255,255,0.3);
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
      @include('pages.quiz.layouts.navbar')
      
      {{-- content --}}
      @yield('container')
      
      {{-- footer --}}
      {{-- @include('pages.quiz.layouts.footer') --}}
      
      <script>
        const QUIZ_DATA = @json(session('quiz_data'));
        const QUIZ_DURATION_MINUTES = QUIZ_DATA ? QUIZ_DATA.duration_minutes : 0; 
        
        class QuizTimer {
            constructor() {
                this.timerElement = document.getElementById('timer');
                this.statusElement = document.getElementById('status');
                this.interval = null;
                this.beforeUnloadHandler = null;
                this.init();
            }

            init() {
                // Cek apakah quiz sudah dimulai sebelumnya
                const startTime = localStorage.getItem('quiz_start_time');
                const duration = localStorage.getItem('quiz_duration');
                
                if (startTime && duration) {
                    // Resume timer
                    this.resumeTimer(parseInt(startTime), parseInt(duration));
                } else {
                    // Belum dimulai
                    this.timerElement.textContent = QUIZ_DURATION_MINUTES + ':00';
                    this.statusElement.textContent = 'Belum dimulai';
                }
            }

            start(durationMinutes) {
                // Simpan waktu mulai dan durasi ke localStorage
                const startTime = Date.now();
                const duration = durationMinutes * 60 * 1000; 
                
                localStorage.setItem('quiz_start_time', startTime);
                localStorage.setItem('quiz_duration', duration);
                localStorage.setItem('quiz_active', 'true');
                
                this.startCountdown(startTime, duration);
                this.statusElement.textContent = 'Aktif';
                
                // if (durationMinutes >= 10) {
                //     this.addBeforeUnloadWarning();
                // }
                
                // Show sections
                document.getElementById('sections').style.display = 'grid';
                document.getElementById('startBtn').style.display = 'none';
                document.getElementById('quizStatus').textContent = 'Sedang Berjalan';
            }

            resumeTimer(startTime, duration) {
                const elapsed = Date.now() - startTime;
                const remaining = duration - elapsed;
                
                if (remaining <= 0) {
                    this.expired();
                    return;
                }
                
                this.startCountdown(startTime, duration);
                this.statusElement.textContent = 'Aktif';
                
                // Pasang warning jika quiz masih aktif
                // if (remaining > 30000) { // Jika masih ada waktu > 30 detik
                //     this.addBeforeUnloadWarning();
                // }
                
                // Show sections jika quiz aktif
                document.getElementById('sections').style.display = 'grid';
                document.getElementById('startBtn').style.display = 'none';
                document.getElementById('quizStatus').textContent = 'Sedang Berjalan';
            }

            startCountdown(startTime, duration) {
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
                clearInterval(this.interval);
                this.timerElement.textContent = '0:00';
                this.timerElement.className = 'timer expired';
                this.statusElement.textContent = 'Waktu Habis!';
                
                // Auto submit quiz
                alert('⏰ Waktu quiz habis! Quiz akan otomatis di-submit.');
                this.removeBeforeUnloadWarning(); // Hapus warning sebelum auto submit
                this.autoSubmit();
            }

            autoSubmit() {
                // window.location.href = '/quiz/submit';
                console.log('Auto submit quiz...');
                    localStorage.removeItem('quiz_start_time');
                    localStorage.removeItem('quiz_duration');
                    localStorage.removeItem('quiz_active');
                }

            // Method untuk cek apakah quiz masih aktif dan valid
            static isActive() {
                const startTime = localStorage.getItem('quiz_start_time');
                const duration = localStorage.getItem('quiz_duration');
                const active = localStorage.getItem('quiz_active');
                
                if (!startTime || !duration || active !== 'true') {
                    return false;
                }
                
                // Cek apakah waktu masih tersisa
                const elapsed = Date.now() - parseInt(startTime);
                const remaining = parseInt(duration) - elapsed;
                
                return remaining > 0;
            }

            // Method untuk mendapatkan sisa waktu (dalam ms)
            static getRemainingTime() {
                const startTime = parseInt(localStorage.getItem('quiz_start_time'));
                const duration = parseInt(localStorage.getItem('quiz_duration'));
                
                if (!startTime || !duration) return 0;
                
                const elapsed = Date.now() - startTime;
                return Math.max(0, duration - elapsed);
            }
        }

        // Inisialisasi timer
        const quizTimer = new QuizTimer();

        // Functions untuk button
        function startQuiz() {
            quizTimer.start(QUIZ_DURATION_MINUTES);
        }

        function goToSection(sectionId) {
            // Simulasi pindah ke section
            alert(`Pindah ke Section ${sectionId}\n\nTimer akan tetap berjalan di background!`);
            
            // Di implementasi nyata:
            // window.location.href = `/quiz/section/${sectionId}`;
        }
    </script>
  </body>
</html>