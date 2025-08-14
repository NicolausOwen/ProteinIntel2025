<x-guest-layout>
    <!-- Left Panel - Login Form -->
    <div class="w-full md:w-1/2 bg-[#c6dfdf] flex items-center justify-center p-10">
        <div class="w-full max-w-md">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 font-title">Log-In</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-gray-700 mb-1">Email</label>
                    <div class="flex items-center bg-gray-100 rounded-full px-4">
                        <i class="fa fa-envelope text-gray-500"></i>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               placeholder="Enter your email"
                               required autofocus autocomplete="username"
                               class="w-full ml-3 border-0 bg-transparent focus:ring-0 focus:outline-none" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-gray-700 mb-1">Password</label>
                    <div class="flex items-center bg-gray-100 rounded-full px-4">
                        <i class="fa fa-lock text-gray-500"></i>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               placeholder="Enter your password"
                               required autocomplete="current-password"
                               class="w-full ml-3 border-0 bg-transparent focus:ring-0 focus:outline-none" />
                        <i class="fa fa-eye text-gray-500 cursor-pointer" onclick="togglePassword('password')" id="passwordIcon"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" 
                               class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 w-4 h-4" 
                               name="remember">
                        <span class="ml-2 text-sm text-gray-700">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="bg-[#7F8CAA] hover:bg-[#6c7893] text-white w-full py-2 rounded-full font-semibold transition duration-200">
                        {{ __('Log-In') }}
                    </button>
                </div>

                <!-- Sign-Up -->
                <p class="text-center text-gray-700">
                    Don't have an account yet?
                    <a href="{{ route('register') }}" class="text--600 font-semibold hover:underline">Sign-Up</a>
                </p>
            </form>
        </div>
    </div>

    <!-- Right Panel - Welcome Back -->
    <div class="w-full md:w-1/2 bg-[#8794ba] text-white p-10 flex flex-col justify-center items-start">
        <h2 class="text-4xl font-bold mb-4 font-title">Welcome Back!</h2>
        <p class="text-lg leading-relaxed">
            Practice now and turn <br />
            your dreams into reality.
        </p>
    </div>
</x-guest-layout>

<script>
    function togglePassword(fieldId) {
        const password = document.getElementById(fieldId);
        const toggleIcon = document.getElementById(fieldId + 'Icon');
        const isVisible = password.type === 'text';
        password.type = isVisible ? 'password' : 'text';
        toggleIcon.classList.toggle('fa-eye');
        toggleIcon.classList.toggle('fa-eye-slash');
    }
</script>
