<nav id="main-navbar"
     style="background-color: #333446;"
     class="fixed top-0 left-0 right-0 z-50 w-full border-gray-200 dark:border-gray-700 
            rounded-bl-[25px] rounded-br-[25px] transition-transform duration-300 ease-in-out translate-y-0">

    <div class="max-w-screen-xl mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Logo -->
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
        <span class="text-2xl font-semibold whitespace-nowrap text-white">Protein</span>
        </a>
        
        <!-- Center Menu -->
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

        <div class="relative group">
            <!-- Dropdown -->
            {{-- <button class="flex items-center text-white font-semibold hover:text-black transition rounded-[10px] px-3 py-2"
                    onmouseover="this.style.backgroundColor='#B8CFCE'"
                    onmouseout="this.style.backgroundColor='transparent'">
            Quizzes
            <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 10 6">
                <path d="M1 1l4 4 4-4" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            </button> --}}

            {{-- <div class="absolute left-0 z-10 hidden group-hover:block mt-2 w-44 bg-white text-gray-700 rounded-lg shadow-sm">
            <ul class="py-2 text-sm">
                <li><a href="#" class="block px-4 py-2 hover:bg-[#B8CFCE] rounded-[10px]">Lorem</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-[#B8CFCE] rounded-[10px]">Ipsum</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-[#B8CFCE] rounded-[10px]">Dolor</a></li>
            </ul>
            </div> --}}
        </div>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden md:flex items-center space-x-4">
        @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}"
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
    </div>
</nav>
