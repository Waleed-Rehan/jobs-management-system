@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between flex-wrap gap-4">
        {{-- Mobile: Prev / Next only --}}
        <div class="flex w-full sm:hidden items-center justify-between">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-medium
                             text-gray-400 border border-white/20 bg-white/5 cursor-not-allowed select-none">
                    ‹ Prev
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-medium
                          text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700
                          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500/80 transition">
                    ‹ Prev
                </a>
            @endif

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-medium
                          text-white bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700
                          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500/80 transition">
                    Next ›
                </a>
            @else
                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1.5 text-xs font-medium
                             text-gray-400 border border-white/20 bg-white/5 cursor-not-allowed select-none">
                    Next ›
                </span>
            @endif
        </div>

        {{-- Desktop: numbered pager --}}
        <div class="hidden sm:flex items-center gap-2">
            {{-- Previous --}}
            @if ($paginator->onFirstPage())
                <span class="inline-flex items-center rounded-full px-3 py-1.5 text-sm font-medium
                             text-gray-400 border border-white/20 bg-white/5 cursor-not-allowed select-none">‹</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                   class="inline-flex items-center rounded-full px-3 py-1.5 text-sm font-medium
                          text-gray-100 border border-white/20 bg-white/10 hover:bg-white/20
                          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500/70 transition">‹</a>
            @endif

            {{-- Page Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    {{-- Ellipses --}}
                    <span class="inline-flex items-center rounded-full px-3 py-1.5 text-sm font-medium
                                 text-gray-400 border border-white/10 bg-white/5 select-none">…</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- Active --}}
                            <span aria-current="page"
                                  class="inline-flex items-center rounded-full px-3 py-1.5 text-sm font-semibold
                                         text-white bg-gradient-to-r from-blue-600 to-purple-600 shadow
                                         focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500/70 transition">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="inline-flex items-center rounded-full px-3 py-1.5 text-sm font-medium
                                      text-gray-100 border border-white/20 bg-white/10 hover:bg-white/20
                                      focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500/70 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                   class="inline-flex items-center rounded-full px-3 py-1.5 text-sm font-medium
                          text-gray-100 border border-white/20 bg-white/10 hover:bg-white/20
                          focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-purple-500/70 transition">›</a>
            @else
                <span class="inline-flex items-center rounded-full px-3 py-1.5 text-sm font-medium
                             text-gray-400 border border-white/20 bg-white/5 cursor-not-allowed select-none">›</span>
            @endif
        </div>
    </nav>
@endif
