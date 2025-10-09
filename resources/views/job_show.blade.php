<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-red-400 leading-tight">
            {{ __('Job Details') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg space-y-6">

                <h3 class="text-2xl font-bold text-gray-800 dark:text-white">
                    {{ $job->title }}
                </h3>

                <div class="space-y-2 text-gray-700 dark:text-gray-100">
                    <p><span class="font-semibold">Location:</span> {{ $job->location }}</p>
                    <p><span class="font-semibold">Employment Type:</span> {{ ucfirst($job->employment_type) }}</p>
                    <p><span class="font-semibold">Experience Level:</span> {{ $job->experience_level ?? 'Not specified' }}</p>
                    <p><span class="font-semibold">Salary:</span> {{ $job->salary ? '$' . number_format($job->salary, 2) : 'Not specified' }}</p>
                    <p><span class="font-semibold">Description:</span></p>
                    <p class="text-sm leading-relaxed mt-1">{{ $job->description ?? 'No description provided.' }}</p>
                </div>

                <div class="pt-4 flex justify-end space-x-3">
                    <a href="{{ route('jobs.edit', $job->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded">
                        Edit
                    </a>
                    <a href="{{ route('home') }}" class="bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-white text-sm px-4 py-2 rounded">
                        ← Back to Jobs
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
