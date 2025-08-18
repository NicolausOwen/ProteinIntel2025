<nav id="main-navbar"
     class="fixed top-0 left-0 right-0 z-50 w-full border-gray-200 dark:border-gray-700 
            rounded-bl-[25px] rounded-br-[25px] transition-all duration-300 ease-in-out translate-y-0 bg-transparent py-5">

    <div class="max-w-screen-xl mx-auto px-4 flex items-center justify-between">
        <!-- Logo (tetap kiri) -->
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="text-2xl font-semibold whitespace-nowrap text-white">Protein</span>
        </a>

        <!-- Menu tengah (desktop only - TIDAK diubah) -->
        <div class="hidden md:flex flex-1 justify-center space-x-6">
            <a href="/" class="text-white font-semibold hover:text-black transition rounded-[10px] px-3 py-2"
               onmouseover="this.style.backgroundColor='#B8CFCE'"
               onmouseout="this.style.backgroundColor='transparent'">
                Home
            </a>
            <a href="/take-a-quiz" class="text-white font-semibold hover:text-black transition rounded-[10px] px-3 py-2"
               onmouseover="this.style.backgroundColor='#B8CFCE'"
               onmouseout="this.style.backgroundColor='transparent'">
                Try Out Quiz
            </a>
            <a href="/about-us" class="text-white font-semibold hover:text-black transition rounded-[10px] px-3 py-2"
               onmouseover="this.style.backgroundColor='#B8CFCE'"
               onmouseout="this.style.backgroundColor='transparent'">
                About Us
            </a>
        </div>

        <!-- Auth kanan (desktop only - TIDAK diubah) -->
        <div class="hidden md:flex items-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('filament.user.pages.dashboard') }}"
                       class="text-white font-semibold hover:text-black transition rounded-[10px] px-3 py-2"
                       onmouseover="this.style.backgroundColor='#B8CFCE'"
                       onmouseout="this.style.backgroundColor='transparent'">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="text-white font-semibold hover:text-black transition rounded-[10px] px-3 py-2"
                       onmouseover="this.style.backgroundColor='#B8CFCE'"
                       onmouseout="this.style.backgroundColor='transparent'">
                        Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="text-white font-semibold hover:text-black transition rounded-[10px] px-3 py-2"
                           onmouseover="this.style.backgroundColor='#B8CFCE'"
                           onmouseout="this.style.backgroundColor='transparent'">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Tombol hamburger (mobile only) -->
        <button id="menu-toggle" class="md:hidden text-white p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-white/40">
            <!-- icon open -->
            <svg id="icon-open" class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- icon close -->
            <svg id="icon-close" class="h-7 w-7 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- MOBILE PANEL: menu + auth (hanya mobile, desktop tidak terpengaruh) -->
    <div id="mobile-panel"
         class="md:hidden max-h-0 overflow-hidden transition-[max-height] duration-300 ease-in-out">
        <div class="mx-4 mt-3 mb-4 rounded-2xl bg-[#1c1d2a]/95 backdrop-blur px-4 py-4 space-y-2">
            <a href="/" class="block text-white font-semibold rounded-[10px] px-3 py-2"
               onmouseover="this.style.backgroundColor='#B8CFCE'; this.style.color='#000'"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#fff'">
               Home
            </a>
            <a href="/take-a-quiz" class="block text-white font-semibold rounded-[10px] px-3 py-2"
               onmouseover="this.style.backgroundColor='#B8CFCE'; this.style.color='#000'"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#fff'">
               Try Out Quiz
            </a>
            <a href="/about-us" class="block text-white font-semibold rounded-[10px] px-3 py-2"
               onmouseover="this.style.backgroundColor='#B8CFCE'; this.style.color='#000'"
               onmouseout="this.style.backgroundColor='transparent'; this.style.color='#fff'">
               About Us
            </a>

            <div class="border-t border-white/10 my-2"></div>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="block text-white font-semibold rounded-[10px] px-3 py-2"
                       onmouseover="this.style.backgroundColor='#B8CFCE'; this.style.color='#000'"
                       onmouseout="this.style.backgroundColor='transparent'; this.style.color='#fff'">
                       Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="block text-white font-semibold rounded-[10px] px-3 py-2"
                       onmouseover="this.style.backgroundColor='#B8CFCE'; this.style.color='#000'"
                       onmouseout="this.style.backgroundColor='transparent'; this.style.color='#fff'">
                       Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="block text-white font-semibold rounded-[10px] px-3 py-2"
                           onmouseover="this.style.backgroundColor='#B8CFCE'; this.style.color='#000'"
                           onmouseout="this.style.backgroundColor='transparent'; this.style.color='#fff'">
                           Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>

<script>
    (function () {
        const toggle = document.getElementById('menu-toggle');
        const panel  = document.getElementById('mobile-panel');
        const openIc = document.getElementById('icon-open');
        const closeIc= document.getElementById('icon-close');

        let open = false;

        function setOpen(state) {
            open = state;
            panel.style.maxHeight = open ? panel.scrollHeight + 'px' : '0px';
            openIc.classList.toggle('hidden', open);
            closeIc.classList.toggle('hidden', !open);
        }

        toggle.addEventListener('click', () => setOpen(!open));

        // Tutup panel saat resize ke desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) setOpen(false);
        });

        // Opsional: tutup saat klik link mobile
        panel.querySelectorAll('a').forEach(a => a.addEventListener('click', () => setOpen(false)));
    })();
</script>
