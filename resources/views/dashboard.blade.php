<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
                <div class="p-6 space-y-4 text-gray-700 dark:text-gray-100">
                    <p class="text-lg font-semibold">
                        {{ __("You're logged in!") }}
                    </p>

                    <div class="flex items-center justify-between bg-gray-50 dark:bg-gray-700 px-4 py-3 rounded-md">
                        <span class="text-sm text-gray-600 dark:text-gray-300">Ready to find a new job?</span>
                        <a href="{{ url('/showingjobspage') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm transition">
                            View Jobs →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
