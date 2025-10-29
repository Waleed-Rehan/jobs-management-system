<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 leading-tight">
            {{ __('Job Details') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 dark:bg-gray-900/20 dark:border-gray-700 p-6 shadow-xl rounded-2xl space-y-6 transition hover:ring-2 hover:ring-purple-500">

                <h3 class="text-2xl font-bold text-gray-800 dark:text-white tracking-wide">
                    {{ $job->title }}
                </h3>

                <div class="space-y-3 text-gray-700 dark:text-gray-100 text-sm leading-relaxed">
                    <p><span class="font-semibold text-purple-600 dark:text-purple-400">📍 Location:</span> {{ $job->location }}</p>
                    <p><span class="font-semibold text-purple-600 dark:text-purple-400">💼 Employment Type:</span> {{ ucfirst($job->employment_type) }}</p>
                    <p><span class="font-semibold text-purple-600 dark:text-purple-400">🧠 Experience Level:</span> {{ $job->experience_level ?? 'Not specified' }}</p>
                    <p><span class="font-semibold text-purple-600 dark:text-purple-400">💰 Salary:</span> {{ $job->salary ? '$' . number_format($job->salary, 2) : 'Not specified' }}</p>
                    <p><span class="font-semibold text-purple-600 dark:text-purple-400">📝 Description:</span></p>
                    <p>{{ $job->description ?? 'No description provided.' }}</p>
                </div>

                <div class="pt-4 flex justify-end space-x-3">
                    <a href="{{ route('jobs.edit', $job->id) }}"
                       class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-sm px-5 py-2 rounded-full shadow-md transition duration-300 ease-in-out">
                        ✏️ Edit
                    </a>
                    <a href="{{ route('home') }}"
                       class="bg-white/10 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 text-gray-800 dark:text-white text-sm px-5 py-2 rounded-full hover:scale-105 transition duration-300 ease-in-out">
                        ← Back to Jobs
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
