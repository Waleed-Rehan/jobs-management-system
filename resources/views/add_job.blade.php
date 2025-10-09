<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-red-400 leading-tight">
            {{ __('Add a New Job') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('jobs.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Job Title</label>
                        <input type="text" name="title" class="mt-1 block w-full rounded-md shadow-sm" required>
                    </div>

                    
                    <div>
                        <label for="location" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Location</label>
                        <input type="text" name="location" class="mt-1 block w-full rounded-md shadow-sm" required>
                    </div>

                    <div>
                        <label for="salary" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Salary</label>
                        <input type="number" step="0.01" name="salary" class="mt-1 block w-full rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="employment_type" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Employment Type</label>
                        <select name="employment_type" class="mt-1 block w-full rounded-md shadow-sm" required>
                            <option value="full-time">Full-time</option>
                            <option value="part-time">Part-time</option>
                            <option value="contract">Contract</option>
                            <option value="freelance">Freelance</option>
                        </select>
                    </div>

                    <div>
                        <label for="experience_level" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Experience Level</label>
                        <input type="text" name="experience_level" class="mt-1 block w-full rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Description</label>
                        <textarea name="description" rows="4" class="mt-1 block w-full rounded-md shadow-sm"></textarea>
                    </div>
                    


                    <div class="flex justify-between mt-6">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Job</button>
                        <a href="/showingjobspage" class="text-blue-500 hover:underline">← Back to Home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
