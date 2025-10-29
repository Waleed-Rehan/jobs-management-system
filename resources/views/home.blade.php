<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 dark:bg-gray-900/20 dark:border-gray-700 p-6 shadow-xl rounded-2xl transition hover:ring-2 hover:ring-purple-500">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-2xl font-semibold capitalize text-gray-800 dark:text-gray-100 tracking-wide">
                        Available Jobs
                    </h3>
                </div>

                @if ($jobs->isEmpty())
                    <div class="text-center text-gray-400">
                        <img src="/assets/no-jobs.svg" alt="No jobs" class="mx-auto w-32 mb-4" />
                        <p>No jobs found.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($jobs as $job)
                            <div class="bg-white/10 backdrop-blur-md border border-white/20 dark:bg-gray-800/30 dark:border-gray-700 rounded-xl shadow-lg p-5 flex flex-col justify-between transition-transform hover:scale-[1.02] hover:ring-2 hover:ring-blue-400">
                                <a href="{{ route('jobs.show', $job->id) }}" class="block space-y-2 text-inherit">
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white">
                                        {{ $job->title }}
                                    </h4>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 flex items-center gap-1">
                                        📍 {{ $job->location }} • {{ ucfirst($job->employment_type) }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                        🧠 Experience: {{ $job->experience_level ?? 'N/A' }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                        💰 Salary: {{ $job->salary ?? 'N/A' }}
                                    </p>
                                </a>

                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('jobs.edit', $job->id) }}"
                                       class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white text-xs px-4 py-1 rounded-full transition">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                          onsubmit="return confirm('Delete this job?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 text-white text-xs px-4 py-1 rounded-full transition">
                                            🗑️ Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Floating Add Job Button -->
    <a href="{{ route('jobs.create') }}"
       class="fixed bottom-6 right-6 bg-gradient-to-r from-blue-600 to-purple-600 text-white p-4 rounded-full shadow-lg hover:scale-105 transition duration-300 ease-in-out z-50">
        ➕
    </a>
</x-app-layout>
