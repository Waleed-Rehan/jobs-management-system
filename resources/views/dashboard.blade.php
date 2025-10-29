{{-- resources/views/home.blade.php --}}
<x-app-layout>
    {{-- Short, encouraging header --}}
    <x-slot name="header">
        <div class="rounded-xl px-4 py-1 relative overflow-hidden">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
                <div class="absolute inset-0 opacity-[0.06] [mask-image:radial-gradient(60%_60%_at_50%_0%,black,transparent)]">
                    <div class="absolute inset-0 [background-image:linear-gradient(to_right,rgba(0,0,0,.10)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,.10)_1px,transparent_1px)] [background-size:20px_20px] dark:[background-image:linear-gradient(to_right,rgba(255,255,255,.10)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.10)_1px,transparent_1px)]"></div>
                </div>
                <div class="absolute -top-10 right-0 h-40 w-40 rounded-full blur-2xl opacity-25 bg-gradient-to-tr from-slate-200 to-indigo-200 dark:from-gray-800 dark:to-indigo-900"></div>
            </div>

            <h2 class="font-semibold text-[1.35rem] tracking-tight text-slate-800 dark:text-slate-100">
                Welcome{{ Auth::check() && Auth::user()?->name ? ', '.Auth::user()->name : '' }} 👋
            </h2>
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-950 dark:to-gray-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- HERO / ENCOURAGEMENT --}}
            <section class="relative overflow-hidden rounded-2xl border border-white/20 dark:border-white/10 bg-white/70 dark:bg-gray-900/40 backdrop-blur-xl p-6 sm:p-8 shadow-[0_12px_35px_-12px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
                    <div class="absolute -top-28 -left-10 h-72 w-72 rounded-full blur-3xl opacity-30 bg-gradient-to-tr from-indigo-300 via-purple-300 to-pink-300 dark:from-indigo-900 dark:via-fuchsia-900 dark:to-pink-900"></div>
                    <div class="absolute -bottom-28 right-0 h-72 w-72 rounded-full blur-3xl opacity-30 bg-gradient-to-tr from-amber-300 via-rose-300 to-pink-300 dark:from-amber-900 dark:via-rose-900 dark:to-pink-900"></div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2">
                        <p class="text-sm text-slate-600 dark:text-slate-400">You’re logged in — let’s make progress today.</p>
                        <h1 class="mt-1 text-2xl sm:text-3xl font-semibold tracking-tight text-slate-900 dark:text-slate-100">
                            Your next great role (or hire) is a few focused steps away.
                        </h1>
                        <p class="mt-3 text-[0.95rem] leading-7 text-slate-700 dark:text-slate-300">
                            Explore openings, refine listings, and keep momentum. A small action now compounds over the week.
                            We’ll keep things calm, structured, and fast.
                        </p>

                        <div class="mt-5 flex flex-wrap items-center gap-3">
                            <a href="{{ url('/showingjobspage') }}"
                               class="inline-flex items-center h-10 rounded-full px-5 text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-indigo-500 transition">
                                🚀 View Jobs
                            </a>
                            <a href="{{ route('jobs.create') }}"
                               class="inline-flex items-center h-10 rounded-full px-5 text-sm font-medium text-slate-800 dark:text-slate-100 border border-white/30 bg-white/60 dark:bg-gray-900/50 hover:bg-white/80 dark:hover:bg-gray-900/70 transition">
                                ➕ Post a Job
                            </a>
                            <a href="{{ route('profile.edit') }}"
                               class="inline-flex items-center h-10 rounded-full px-4 text-sm text-slate-700 dark:text-slate-300 hover:underline">
                                ✏️ Update Profile
                            </a>
                        </div>
                    </div>

                    {{-- Tiny Wins / Stats --}}
                    <div class="grid grid-cols-3 gap-3 lg:grid-cols-1">
                        <div class="rounded-xl border border-white/30 dark:border-white/10 bg-white/70 dark:bg-white/10 p-4">
                            <div class="text-[11px] uppercase tracking-wide text-slate-500 dark:text-slate-400">Focus</div>
                            <div class="mt-1 text-2xl font-semibold text-slate-900 dark:text-slate-100">Today</div>
                        </div>
                        <div class="rounded-xl border border-white/30 dark:border-white/10 bg-white/70 dark:bg-white/10 p-4">
                            <div class="text-[11px] uppercase tracking-wide text-slate-500 dark:text-slate-400">Roles</div>
                            <div class="mt-1 text-2xl font-semibold text-slate-900 dark:text-slate-100">Live</div>
                        </div>
                        <div class="rounded-xl border border-white/30 dark:border-white/10 bg-white/70 dark:bg-white/10 p-4">
                            <div class="text-[11px] uppercase tracking-wide text-slate-500 dark:text-slate-400">Pipeline</div>
                            <div class="mt-1 text-2xl font-semibold text-slate-900 dark:text-slate-100">Ready</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- NEXT STEPS CHECKLIST --}}
            <section class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/35 backdrop-blur-xl p-6 sm:p-8 shadow-[0_10px_28px_-14px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                <h3 class="text-lg font-semibold tracking-tight text-slate-900 dark:text-slate-100">Next steps to build momentum</h3>
                <ul class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-3 text-[0.95rem] text-slate-700 dark:text-slate-300">
                    <li class="flex items-start gap-2">
                        <span class="mt-1 text-green-500">✔</span>
                        <span>Browse openings and shortlist 3 roles to focus on today.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 text-indigo-500">✔</span>
                        <span>Polish one job description for clarity and requirements.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 text-purple-500">✔</span>
                        <span>Set a fair range: add or review salary info for transparency.</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="mt-1 text-rose-500">✔</span>
                        <span>Share a role with a colleague or candidate for feedback.</span>
                    </li>
                </ul>

                <div class="mt-5 flex flex-wrap items-center gap-3">
                    <a href="{{ url('/showingjobspage') }}"
                       class="inline-flex items-center h-10 rounded-full px-5 text-sm font-semibold text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 transition">
                        Start Now
                    </a>
                    <a href="{{ route('jobs.create') }}"
                       class="inline-flex items-center h-10 rounded-full px-5 text-sm font-medium text-slate-800 dark:text-slate-100 border border-white/30 bg-white/60 dark:bg-gray-900/50 hover:bg-white/80 dark:hover:bg-gray-900/70 transition">
                        Add a Role
                    </a>
                </div>
            </section>

            {{-- RECENT JOBS TEASER (optional, shows if you pass $recentJobs) --}}
            @isset($recentJobs)
            @if($recentJobs->count())
            <section class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/60 dark:bg-gray-900/35 backdrop-blur-xl p-6 sm:p-8 shadow-[0_10px_28px_-14px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-semibold tracking-tight text-slate-900 dark:text-slate-100">Recently added</h3>
                    <a href="{{ url('/showingjobspage') }}" class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">See all</a>
                </div>
                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($recentJobs as $job)
                        <a href="{{ route('jobs.show', $job->id) }}"
                           class="group rounded-xl border border-white/30 dark:border-white/10 bg-white/70 dark:bg-gray-800/40 backdrop-blur-xl p-4 shadow hover:shadow-lg transition">
                            <div class="flex items-start justify-between gap-3">
                                <h4 class="text-sm font-semibold text-slate-900 dark:text-slate-100 line-clamp-2">
                                    {{ $job->title }}
                                </h4>
                                <span class="text-[11px] text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                    {{ optional($job->created_at)->diffForHumans() }}
                                </span>
                            </div>
                            <p class="mt-2 text-xs text-slate-600 dark:text-slate-400">
                                📍 {{ $job->location }} • {{ ucfirst($job->employment_type) }}
                            </p>
                            <p class="mt-1 text-xs text-slate-600 dark:text-slate-400 line-clamp-2">
                                {{ $job->description ?: 'No description provided.' }}
                            </p>
                        </a>
                    @endforeach
                </div>
            </section>
            @endif
            @endisset

            {{-- TESTIMONIAL / ENCOURAGEMENT CARD --}}
            <section class="rounded-2xl border border-dashed border-white/30 dark:border-white/10 bg-white/50 dark:bg-gray-900/30 backdrop-blur-xl p-6 sm:p-8">
                <figure class="max-w-3xl">
                    <blockquote class="text-[1.05rem] leading-7 text-slate-800 dark:text-slate-200">
                        “Consistent, small improvements beat random bursts. One clear job post, one solid shortlist, one thoughtful message —
                        that’s how great teams and careers are built.”
                    </blockquote>
                    <figcaption class="mt-3 text-sm text-slate-600 dark:text-slate-400">— Your friendly dashboard</figcaption>
                </figure>
            </section>
        </div>
    </div>

    {{-- Shortcuts: press "J" to go to Jobs --}}
    <script>
        document.addEventListener('keydown', (e) => {
            if ((e.key === 'j' || e.key === 'J') && !e.target.matches('input, textarea')) {
                window.location.href = @json(url('/showingjobspage'));
            }
        });
    </script>
</x-app-layout>
