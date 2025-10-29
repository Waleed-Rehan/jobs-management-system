<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 dark:bg-gray-900/20 dark:border-gray-700 shadow-xl rounded-2xl overflow-hidden transition hover:ring-2 hover:ring-purple-500">
                <div class="p-6 space-y-6 text-gray-700 dark:text-gray-100">
                    <p class="text-lg font-semibold tracking-wide">
                        ✅ {{ __("You're logged in!") }}
                    </p>

                    <div class="flex items-center justify-between bg-white/10 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 px-4 py-3 rounded-xl shadow-sm">
                        <span class="text-sm text-gray-600 dark:text-gray-300">Ready to find a new job?</span>
                        <a href="{{ url('/showingjobspage') }}"
                           class="bg-gradient-to-r from-blue-600 to-purple-600 text-white px-4 py-2 rounded-full hover:scale-105 transition duration-300 ease-in-out text-sm shadow-md">
                            View Jobs →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
