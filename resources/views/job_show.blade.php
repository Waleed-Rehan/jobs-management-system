{{-- resources/views/jobs/show.blade.php --}}
<x-app-layout>
   {{-- Short, subtle header --}}
<x-slot name="header">
    <div class="rounded-xl px-4 py-1 relative overflow-hidden">
        <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10">
            {{-- very soft grid + gentle tint (muted, not bright) --}}
            <div class="absolute inset-0 opacity-[0.06] [mask-image:radial-gradient(60%_60%_at_50%_0%,black,transparent)]">
                <div class="absolute inset-0 [background-image:linear-gradient(to_right,rgba(0,0,0,.12)_1px,transparent_1px),linear-gradient(to_bottom,rgba(0,0,0,.12)_1px,transparent_1px)] [background-size:20px_20px] dark:[background-image:linear-gradient(to_right,rgba(255,255,255,.12)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.12)_1px,transparent_1px)]"></div>
            </div>
            <div class="absolute -top-10 right-0 h-40 w-40 rounded-full blur-2xl opacity-25 bg-gradient-to-tr from-slate-300 to-indigo-200 dark:from-gray-800 dark:to-indigo-900"></div>
        </div>

        <div class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                {{-- Title: slightly larger, soft professional blue tone --}}
                <h2 class="text-[1.25rem] sm:text-[1.35rem] font-semibold tracking-tight text-sky-700 dark:text-sky-600 truncate">
                    {{ $job->title }}
                </h2>

                {{-- Meta info in semi-rounded gray “chips” --}}
                <div class="mt-2 flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                        📍 {{ $job->location }}
                    </span>

                    <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                        💼 {{ ucfirst($job->employment_type) }}
                    </span>

                    @if($job->experience_level)
                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                            🧠 {{ $job->experience_level }}
                        </span>
                    @endif

                    @if ($job->created_at)
                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-[11px] font-medium text-slate-700 dark:text-slate-200 bg-slate-200/70 dark:bg-slate-700/40">
                            ⏰ Posted {{ $job->created_at->diffForHumans() }}
                        </span>
                    @endif
                </div>
            </div>

            <div class="flex items-center gap-2 shrink-0">
                <button type="button"
                        onclick="copyJobLink()"
                        class="inline-flex items-center gap-2 h-8 px-3 rounded-full text-xs font-medium text-slate-800 dark:text-slate-100 border border-white/25 bg-white/50 dark:bg-gray-900/40 hover:bg-white/70 dark:hover:bg-gray-900/60 transition">
                    🔗 Copy link
                </button>

                <a href="{{ route('jobs.edit', $job->id) }}"
                   class="inline-flex items-center gap-2 h-8 px-3 rounded-full text-xs font-medium text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 transition">
                    ✏️ Edit
                </a>

                <a href="{{ route('home') }}"
                   class="hidden sm:inline-flex items-center gap-2 h-8 px-3 rounded-full text-xs font-medium text-slate-800 dark:text-slate-100 border border-white/25 bg-white/50 dark:bg-gray-900/40 hover:bg-white/70 dark:hover:bg-gray-900/60 transition">
                    ← Back
                </a>
            </div>
        </div>
    </div>
</x-slot>


    {{-- Main --}}
    <div class="py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left: Role Overview (templated narrative) --}}
            <section class="lg:col-span-2 rounded-2xl border border-white/20 dark:border-white/10 bg-white/70 dark:bg-gray-900/35 backdrop-blur-xl p-6 sm:p-8 shadow-[0_10px_28px_-14px_rgba(0,0,0,0.35)] ring-1 ring-black/5">
                <h3 class="text-lg font-semibold tracking-tight text-slate-800 dark:text-slate-100">Role Overview</h3>

                @php
                    $title = $job->title;
                    $location = $job->location;
                    $employment = ucfirst($job->employment_type);
                    $experience = $job->experience_level ?: 'not specified';
                    $salary = $job->salary ? ('$'.number_format($job->salary, 2).' / month') : 'not specified';
                    $desc = $job->description ?: null;

                    // Light helpers to softly weave details into paragraphs
                    $introPara = "We’re looking for a {$title} to support our team with practical, high-impact work. Based in {$location} with a {$employment} arrangement, this role values clarity, collaboration, and steady execution. Ideal experience is {$experience}.";
                    $descPara = $desc ? nl2br(e($desc)) : "This role invites someone who is thoughtful, hands-on, and comfortable shaping solutions with a calm, methodical approach.";
                @endphp

                <div class="mt-4 space-y-6 text-[0.95rem] leading-7 text-slate-700 dark:text-slate-300">
                    {{-- About the company --}}
                    <div>
                        <h4 class="text-sm font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-400">About the Company</h4>
                        <p class="mt-2">
                            {{ $introPara }}
                            Our culture favors clear communication, supportive code reviews, and realistic delivery goals.
                            We prefer well-structured work over urgency, and we strive to keep meetings short and decisions documented.
                        </p>
                    </div>

                    {{-- Core Responsibilities (derived from description when available) --}}
                    <div>
                        <h4 class="text-sm font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-400">Core Responsibilities</h4>
                        <p class="mt-2">
                            {!! $descPara !!}
                        </p>
                        <ul class="mt-3 list-disc list-inside space-y-1">
                            <li>Deliver reliable, maintainable work that aligns with team goals.</li>
                            <li>Collaborate with peers and stakeholders through concise updates and feedback.</li>
                            <li>Document decisions and keep tasks scoped and testable.</li>
                            <li>Support quality through reviews, linting, and incremental improvements.</li>
                        </ul>
                    </div>

                    {{-- Why this role matters (for recruiters / business value) --}}
                    <div>
                        <h4 class="text-sm font-semibold uppercase tracking-wide text-slate-600 dark:text-slate-400">Why This Role Matters</h4>
                        <p class="mt-2">
                            This position strengthens the team’s ability to ship dependable outcomes on a predictable cadence.
                            By keeping scope clear and trade-offs explicit, the {{ strtolower($title) }} helps reduce delivery risk,
                            minimize context switching, and protect focus time—so the roadmap advances with fewer surprises.
                        </p>
                        <div class="mt-3 grid grid-cols-1 sm:grid-cols-2 gap-3 text-sm">
                            <div class="rounded-lg border border-white/20 dark:border-white/10 bg-white/60 dark:bg-white/10 px-3 py-2">
                                <div class="text-slate-600 dark:text-slate-400">Expected Seniority</div>
                                <div class="font-medium text-slate-800 dark:text-slate-100">{{ ucfirst($experience) }}</div>
                            </div>
                            <div class="rounded-lg border border-white/20 dark:border-white/10 bg-white/60 dark:bg-white/10 px-3 py-2">
                                <div class="text-slate-600 dark:text-slate-400">Compensation</div>
                                <div class="font-medium text-slate-800 dark:text-slate-100">{{ $salary }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Right: Snapshot & actions --}}
            <aside class="lg:col-span-1 space-y-6">
                <div class="rounded-2xl border border-white/20 dark:border-white/10 bg-white/70 dark:bg-gray-800/40 backdrop-blur-xl p-6 shadow-[0_10px_30px_-14px_rgba(0,0,0,0.45)]">
                    <h4 class="text-sm font-semibold uppercase tracking-wider text-slate-700 dark:text-slate-300">Snapshot</h4>
                    <dl class="mt-3 space-y-3 text-sm text-slate-800 dark:text-slate-200">
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Employment</dt>
                            <dd class="font-medium">{{ $employment }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Location</dt>
                            <dd class="font-medium">{{ $location }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Experience</dt>
                            <dd class="font-medium">{{ $experience }}</dd>
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Salary</dt>
                            <dd class="font-medium">{{ $salary }}</dd>
                        </div>
                        @if($job->updated_at)
                            <div class="flex items-center justify-between gap-4">
                                <dt class="text-slate-600 dark:text-slate-400">Updated</dt>
                                <dd class="font-medium">{{ $job->updated_at->diffForHumans() }}</dd>
                            </div>
                        @endif
                        <div class="flex items-center justify-between gap-4">
                            <dt class="text-slate-600 dark:text-slate-400">Listing ID</dt>
                            <dd class="font-medium">#{{ $job->id }}</dd>
                        </div>
                    </dl>

                    <div class="mt-6 grid grid-cols-1 gap-2">
                        <a href="{{ route('jobs.edit', $job->id) }}"
                           class="inline-flex items-center justify-center gap-2 h-10 rounded-full text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-violet-600 hover:from-indigo-700 hover:to-violet-700 transition">
                            ✏️ Edit job
                        </a>
                        <a href="{{ route('home') }}"
                           class="inline-flex items-center justify-center gap-2 h-10 rounded-full text-sm font-medium text-slate-800 dark:text-slate-100 border border-white/25 bg-white/50 dark:bg-gray-900/40 hover:bg-white/70 dark:hover:bg-gray-900/60 transition">
                            ← Back to jobs
                        </a>
                    </div>
                </div>

                <div class="rounded-2xl border border-dashed border-white/30 dark:border-white/10 bg-white/50 dark:bg-gray-900/30 backdrop-blur-xl p-5">
                    <p class="text-sm text-slate-600 dark:text-slate-400">
                        Tip: keep this record updated—fresh details help recruiters share an accurate story with candidates.
                    </p>
                </div>
            </aside>
        </div>
    </div>

    {{-- Utilities --}}
    <script>
        function copyJobLink() {
            const url = window.location.href;
            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(url).then(() => flashCopied());
            } else {
                const ta = document.createElement('textarea');
                ta.value = url; document.body.appendChild(ta); ta.select();
                try { document.execCommand('copy'); } finally { document.body.removeChild(ta); flashCopied(); }
            }
        }
        function flashCopied(){
            const btns = document.querySelectorAll('button[onclick="copyJobLink()"]');
            btns.forEach(btn => {
                const original = btn.innerHTML;
                btn.innerHTML = '✅ Copied';
                setTimeout(() => btn.innerHTML = '🔗 Copy link', 1100);
            });
        }
    </script>
</x-app-layout>
