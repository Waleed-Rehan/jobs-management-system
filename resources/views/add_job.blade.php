<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-500 to-red-500 leading-tight">
            {{ __('Add a New Job') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/10 backdrop-blur-md border border-white/20 dark:bg-gray-900/20 dark:border-gray-700 shadow-xl rounded-2xl p-6 space-y-6 transition hover:ring-2 hover:ring-purple-500">

                <form action="{{ route('jobs.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block font-medium text-sm text-purple-600 dark:text-purple-400">Job Title</label>
                        <input type="text" name="title"
                               class="mt-1 block w-full rounded-md bg-white/20 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm focus:ring-purple-500 focus:border-purple-500 transition"
                               required>
                    </div>

                    <div>
                        <label for="location" class="block font-medium text-sm text-purple-600 dark:text-purple-400">Location</label>
                        <input type="text" name="location"
                               class="mt-1 block w-full rounded-md bg-white/20 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm focus:ring-purple-500 focus:border-purple-500 transition"
                               required>
                    </div>

                    <div>
                        <label for="salary" class="block font-medium text-sm text-purple-600 dark:text-purple-400">Salary</label>
                        <input type="number" step="0.01" name="salary"
                               class="mt-1 block w-full rounded-md bg-white/20 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm focus:ring-purple-500 focus:border-purple-500 transition">
                    </div>

                    <div>
                        <label for="employment_type" class="block font-medium text-sm text-purple-600 dark:text-purple-400">Employment Type</label>
                        <select name="employment_type"
                                class="mt-1 block w-full rounded-md bg-white/20 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm focus:ring-purple-500 focus:border-purple-500 transition"
                                required>
                            <option value="full-time">Full-time</option>
                            <option value="part-time">Part-time</option>
                            <option value="contract">Contract</option>
                            <option value="freelance">Freelance</option>
                        </select>
                    </div>

                    <div>
                        <label for="experience_level" class="block font-medium text-sm text-purple-600 dark:text-purple-400">Experience Level</label>
                        <input type="text" name="experience_level"
                               class="mt-1 block w-full rounded-md bg-white/20 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm focus:ring-purple-500 focus:border-purple-500 transition">
                    </div>

                    <div>
                        <label for="description" class="block font-medium text-sm text-purple-600 dark:text-purple-400">Description</label>
                        <textarea name="description" rows="4"
                                  class="mt-1 block w-full rounded-md bg-white/20 dark:bg-gray-800/30 border border-white/20 dark:border-gray-700 text-gray-800 dark:text-white shadow-sm focus:ring-purple-500 focus:border-purple-500 transition"></textarea>
                    </div>

                    <div class="flex justify-between mt-6">
                        <button type="submit"
                                class="bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white px-5 py-2 rounded-full shadow-md transition duration-300 ease-in-out">
                            ➕ Add Job
                        </button>
                        <a href="/showingjobspage"
                           class="text-purple-600 dark:text-purple-400 hover:underline text-sm transition">
                            ← Back to Home
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
