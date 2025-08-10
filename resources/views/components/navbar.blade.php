<nav id="main-navbar"
     class="fixed top-0 left-0 right-0 z-50 w-full border-gray-200 dark:border-gray-700 
            rounded-bl-[25px] rounded-br-[25px] transition-all duration-300 ease-in-out translate-y-0 bg-transparent py-5">

    <div class="max-w-screen-xl mx-auto px-4 flex items-center justify-between">
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