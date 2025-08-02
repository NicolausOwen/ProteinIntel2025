<header class="w-full mx-auto text-sm not-has-[nav]:hidden pt-4 py-4 bg-black text-white">
    <div class="navbar">
        Temporary Navbar 
    </div>

    @if (Route::has('login'))
        <nav class="flex items-center justify-end gap-4">
            @auth
                <a href="{{ url('/dashboard') }}" 
                class="inline-block px-5 py-1.5 text-white/90 hover:text-white border border-white/30 hover:border-white/50 rounded-sm text-sm leading-normal transition-all duration-200">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" 
                class="inline-block px-5 py-1.5 text-white/90 hover:text-white border border-transparent hover:border-white/30 rounded-sm text-sm leading-normal transition-all duration-200">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" 
                    class="inline-block px-5 py-1.5 text-white/90 hover:text-white border border-white/30 hover:border-white/50 rounded-sm text-sm leading-normal transition-all duration-200">
                        Register
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>
