{{-- resources/views/jobs/edit.blade.php --}}
<x-app-layout>
    <div class="py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Form Shell --}}
            <section class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/30 backdrop-blur-xl shadow-[0_12px_35px_-12px_rgba(0,0,0,0.35)] ring-1 ring-black/5">

                <form id="edit-job-form" action="{{ route('jobs.update', $job->id) }}" method="POST" class="p-6 lg:p-8 space-y-8">
                    @csrf
                    @method('PUT')

                    {{-- Validation summary --}}
                    @if ($errors->any())
                        <div class="rounded-xl border border-rose-500/30 bg-rose-500/10 p-4 text-rose-600 dark:text-rose-400">
                            <div class="font-semibold mb-1">Please fix the following:</div>
                            <ul class="list-disc list-inside space-y-0.5 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Section: Basics --}}
                    <div>
                        <div class="mt-3 grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                            {{-- Title --}}
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                                    Job Title <span class="text-rose-500">*</span>
                                </label>
                                <input id="title" type="text" name="title" required
                                       value="{{ old('title', $job->title) }}"
                                       placeholder="e.g., Senior Backend Engineer"
                                       class="mt-1 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/70 transition" />
                                @error('title')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Location --}}
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                                    Location <span class="text-rose-500">*</span>
                                </label>
                                <input id="location" type="text" name="location" required
                                       value="{{ old('location', $job->location) }}"
                                       placeholder="e.g., Singapore • Remote OK"
                                       class="mt-1 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/70 transition" />
                                @error('location')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Employment Type --}}
                            <div>
                                <label for="employment_type" class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                                    Employment Type <span class="text-rose-500">*</span>
                                </label>
                                <select id="employment_type" name="employment_type" required
                                        class="mt-1 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-purple-500/70 transition">
                                    @foreach (['full-time', 'part-time', 'contract', 'freelance'] as $type)
                                        <option value="{{ $type }}" @selected(old('employment_type', $job->employment_type) === $type)>{{ ucfirst($type) }}</option>
                                    @endforeach
                                </select>
                                @error('employment_type')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Salary --}}
                            <div>
                                <label for="salary" class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                                    Salary (optional)
                                </label>
                                <div class="mt-1 relative">
                                    <input id="salary" type="number" step="0.01" name="salary"
                                           value="{{ old('salary', $job->salary) }}"
                                           placeholder="e.g., 6500"
                                           class="w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/70 transition" />
                                    <span class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 text-xs text-gray-500">/month</span>
                                </div>
                                @error('salary')
                                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Section: Experience --}}
                    <div class="pt-2">
                        <label for="experience_level" class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                            Experience Level
                        </label>
                        <input id="experience_level" type="text" name="experience_level"
                               value="{{ old('experience_level', $job->experience_level) }}"
                               placeholder="e.g., 3+ years with Laravel / NestJS"
                               class="mt-1 w-full rounded-lg bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-2.5 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/70 transition" />
                        @error('experience_level')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Section: Description --}}
                    <div class="pt-2">
                        <label for="description" class="block text-sm font-medium text-gray-800 dark:text-gray-200">
                            Description
                        </label>
                        <textarea id="description" name="description" rows="6"
                                  placeholder="Write a concise role summary, responsibilities, requirements, and benefits…"
                                  class="mt-3 w-full rounded-xl bg-white/70 dark:bg-gray-800/40 border border-white/30 dark:border-white/10 px-3 py-3 text-gray-900 dark:text-gray-100 placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500/70 transition">{{ old('description', $job->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Footer Note and Actions --}}
                    <div class="pt-4 border-t border-white/20 dark:border-white/10 flex flex-col sm:flex-row items-center justify-between gap-3">
                        <p class="text-xs text-gray-500 dark:text-gray-400">Fields marked with <span class="text-rose-500">*</span> are required.</p>
                        <div class="flex items-center gap-3">
                            <a href="{{ route('home') }}"
                               class="inline-flex items-center justify-center h-10 px-4 rounded-full text-sm font-medium text-gray-800 dark:text-gray-100 border border-white/25 bg-white/40 dark:bg-gray-900/40 hover:bg-white/60 dark:hover:bg-gray-900/60 transition">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="inline-flex items-center justify-center h-10 px-5 rounded-full text-sm font-semibold text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-purple-500 transition">
                                ✅ Update Job
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>

    {{-- Optional: live character count --}}
    <script>
        const desc = document.getElementById('description');
        if (desc) {
            desc.addEventListener('input', () => {
                desc.style.borderColor = desc.value.length > 500 ? '#f43f5e' : '';
            });
        }
    </script>
</x-app-layout>
