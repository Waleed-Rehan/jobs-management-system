<x-guest-layout>
    <div class="relative w-full max-w-lg mx-auto mt-20 bg-gradient-to-br from-gray-950 via-gray-900 to-gray-950 border border-gray-800 rounded-2xl shadow-2xl p-10 space-y-10 overflow-hidden">

        <!-- Animated Glow Background -->
        <div class="absolute inset-0 pointer-events-none z-0">
            <div class="absolute -top-20 -left-20 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-pink-500/20 rounded-full blur-3xl animate-pulse"></div>
        </div>

        <!-- Header -->
        <div class="relative z-10 text-center space-y-2">
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 tracking-wide animate-fadeInUp">
                Welcome Aboard
            </h1>
            <p class="text-sm text-gray-400">
                Create your account and step into a beautifully crafted job management experience.
            </p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="relative z-10 space-y-6">
            @csrf

            <!-- Name -->
            <div class="group">
                <x-input-label for="name" :value="__('Name')" class="text-gray-300 group-hover:text-purple-400 transition" />
                <x-text-input id="name"
                              class="mt-1 block w-full rounded-lg bg-gray-900 border border-gray-700 text-gray-100 placeholder-gray-500 focus:ring-pink-500 focus:border-pink-500 transition"
                              type="text"
                              name="name"
                              :value="old('name')"
                              required
                              autofocus
                              autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Email -->
            <div class="group">
                <x-input-label for="email" :value="__('Email')" class="text-gray-300 group-hover:text-purple-400 transition" />
                <x-text-input id="email"
                              class="mt-1 block w-full rounded-lg bg-gray-900 border border-gray-700 text-gray-100 placeholder-gray-500 focus:ring-pink-500 focus:border-pink-500 transition"
                              type="email"
                              name="email"
                              :value="old('email')"
                              required
                              autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Password -->
            <div class="group">
                <x-input-label for="password" :value="__('Password')" class="text-gray-300 group-hover:text-purple-400 transition" />
                <x-text-input id="password"
                              class="mt-1 block w-full rounded-lg bg-gray-900 border border-gray-700 text-gray-100 placeholder-gray-500 focus:ring-pink-500 focus:border-pink-500 transition"
                              type="password"
                              name="password"
                              required
                              autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Confirm Password -->
            <div class="group">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-gray-300 group-hover:text-purple-400 transition" />
                <x-text-input id="password_confirmation"
                              class="mt-1 block w-full rounded-lg bg-gray-900 border border-gray-700 text-gray-100 placeholder-gray-500 focus:ring-pink-500 focus:border-pink-500 transition"
                              type="password"
                              name="password_confirmation"
                              required
                              autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Footer -->
            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('login') }}" class="text-sm text-purple-400 hover:underline transition">
                    Already registered?
                </a>

                <x-primary-button class="bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white px-6 py-2 rounded-full shadow-md transition">
                    Register
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
