<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-red-400 leading-tight">
            {{ __('Home Page') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 p-6 shadow rounded-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-semibold capitalize text-gray-800 dark:text-gray-100">
                        Available Jobs
                    </h3>
                    <a href="{{ route('jobs.create') }}" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">
                        ➕ Add Job
                    </a>
                    
                </div>

                @if ($jobs->isEmpty())
                    <p class="text-gray-400">No jobs found.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($jobs as $job)
                            <div class="bg-gray-200 dark:bg-gray-700 rounded-lg shadow p-5 flex flex-col justify-between hover:ring-2 hover:ring-blue-400 transition">
                                <a href="{{ route('jobs.show', $job->id) }}" class="block space-y-1 text-inherit">
                                    <h4 class="text-lg font-bold text-gray-800 dark:text-white">
                                        {{ $job->title }}
                                    </h4>
                                    <p class="text-sm text-gray-700 dark:text-gray-300">
                                        {{ $job->location }} • {{ ucfirst($job->employment_type) }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                        Experience: {{ $job->experience_level ?? 'N/A' }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300">
                                        Salary: {{ $job->salary ?? 'N/A' }}
                                    </p>
                                </a>

                                <div class="mt-4 flex justify-between items-center">
                                    <a href="{{ route('jobs.edit', $job->id) }}"
                                       class="bg-blue-800 hover:bg-blue-900 text-white text-xs px-3 py-0.5 rounded transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                          onsubmit="return confirm('Delete this job?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-800 hover:bg-red-900 text-white text-xs px-3 py-0.5 rounded transition">
                                            Delete
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
</x-app-layout>
