<x-guest-layout>
    <!-- Right Panel - Welcome Back -->
    <div class="w-full md:w-1/2 bg-[#8794ba] text-white p-10 flex flex-col justify-center items-start">
        <h2 class="text-4xl font-bold mb-4 font-title">Welcome!</h2>
        <p class="text-lg leading-relaxed">
            Practice. Progress.<br />
            Succeed. One step closer <br />
            to your dream.
        </p>
    </div>

    <!-- Left Panel - Login Form -->
    <div class="w-full md:w-1/2 bg-[#c6dfdf] flex items-center justify-center p-10">
        <div class="w-full max-w-md">
            <h2 class="text-3xl font-bold text-gray-800 mb-6 font-title">Sign-Up</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                {{-- Username --}}
                <x-input-label for="name" :value="__('Username')" />
                <div class="flex items-center bg-gray-100 rounded-full px-4">
                    <i class="fa fa-user text-gray-500"></i>
                    <x-text-input id="name"
                                type="text"
                                name="name"
                                :value="old('name')"
                                placeholder="Enter username"
                                required autofocus
                                class="w-full ml-3 border-0 bg-transparent focus:ring-0 focus:outline-none" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                {{-- Email --}}
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <div class="flex items-center bg-gray-100 rounded-full px-4">
                        <i class="fa fa-envelope text-gray-500"></i>
                        <x-text-input id="email"
                                    type="email"
                                    name="email"
                                    :value="old('email')"
                                    placeholder="Enter your email"
                                    required
                                    class="w-full ml-3 border-0 bg-transparent focus:ring-0 focus:outline-none" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                {{-- Password --}}
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <div class="flex items-center bg-gray-100 rounded-full px-4">
                        <i class="fa fa-lock text-gray-500"></i>
                        <x-text-input id="password"
                                    type="password"
                                    name="password"
                                    placeholder="Enter your password"
                                    required
                                    class="w-full ml-3 border-0 bg-transparent focus:ring-0 focus:outline-none" />
                        <i class="fa fa-eye text-gray-500 cursor-pointer" onclick="togglePassword('password')" id="passwordIcon"></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                {{-- Confirm Password --}}
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <div class="flex items-center bg-gray-100 rounded-full px-4">
                        <i class="fa fa-lock text-gray-500"></i>
                        <x-text-input id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    placeholder="Confirm your password"
                                    required
                                    class="w-full ml-3 border-0 bg-transparent focus:ring-0 focus:outline-none" />
                        <i class="fa fa-eye text-gray-500 cursor-pointer" onclick="togglePassword('password_confirmation')" id="password_confirmationIcon"></i>
                    </div>
                </div>

                {{-- Submit --}}
                <div>
                    <button type="submit"
                        class="bg-[#7F8CAA] hover:bg-[#6c7893] text-white w-full py-2 rounded-full font-semibold transition duration-200">
                        {{ __('Sign-Up') }}
                    </button>
                </div>

                {{-- Login Link --}}
                <p class="text-center text-gray-700">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text--600 font-semibold hover:underline">Log-In</a>
                </p>
            </form>
        </div>
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
