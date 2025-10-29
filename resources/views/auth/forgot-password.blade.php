<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-12 bg-white/10 backdrop-blur-md border border-white/20 dark:bg-gray-900/20 dark:border-gray-700 rounded-2xl shadow-xl p-8 space-y-6 animate-fadeInUp">

        <div class="text-sm text-gray-300 dark:text-gray-400 leading-relaxed">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-sm text-green-500" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-purple-600 dark:text-purple-400" />
                <x-text-input id="email"
                              class="mt-1 block w-full rounded-md bg-white/20 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm focus:ring-purple-500 focus:border-purple-500 transition"
                              type="email"
                              name="email"
                              :value="old('email')"
                              required
                              autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <x-primary-button class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-6 py-2 rounded-full shadow-md transition">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
