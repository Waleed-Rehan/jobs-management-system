<nav
    x-data="{ open: false, scrolled: false }"
    x-on:scroll.window="scrolled = (window.pageYOffset > 8)"
    :class="scrolled
        ? 'border-b border-white/20 dark:border-gray-800/60 bg-white/70 dark:bg-gray-900/60 backdrop-blur-xl shadow-[0_8px_24px_-12px_rgba(0,0,0,0.25)]'
        : 'bg-transparent border-b border-transparent'"
    class="relative z-40 transition-all duration-300 ease-in-out"
>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-6">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="shrink-0 flex items-center hover:opacity-90 transition-opacity">
                    <x-application-logo class="block h-8 w-auto fill-current text-purple-600 dark:text-purple-400" />
                </a>

                <!-- Desktop Nav -->
                <div class="hidden sm:flex items-center gap-4">
                    @php
                        // Unified link styling (slightly larger on desktop)
                        $base = 'relative px-2 py-1 text-[15px] sm:text-base font-medium text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors';
                        $underline = 'after:absolute after:left-0 after:-bottom-0.5 after:h-[2px] after:w-0 after:bg-gradient-to-r after:from-blue-500 after:via-violet-500 after:to-fuchsia-500 after:transition-all after:duration-300 hover:after:w-full';
                        $activeUnderline = 'after:w-full';
                    @endphp

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                        class="{{ $base }} {{ $underline }} {{ request()->routeIs('dashboard') ? $activeUnderline : '' }}">
                        🏠 {{ __('Home Page') }}
                    </x-nav-link>

                    <x-nav-link
                        href="/showingjobspage"
                        :active="request()->is('showingjobspage')"
                        class="{{ $base }} {{ $underline }} {{ request()->is('showingjobspage') ? $activeUnderline : '' }}">
                        📋 Jobs
                    </x-nav-link>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center gap-2 px-3 py-2 rounded-md text-[15px] sm:text-base font-medium
                                   text-gray-700 dark:text-gray-300
                                   bg-white/40 dark:bg-gray-800/40
                                   border border-white/30 dark:border-gray-700/50
                                   hover:bg-white/60 dark:hover:bg-gray-800/60
                                   focus-visible:ring-2 focus-visible:ring-purple-500/70 transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-1 h-4 w-4 text-purple-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link class="text-[15px] sm:text-base" :href="route('profile.edit')">
                            👤 {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link class="text-[15px] sm:text-base" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                🚪 {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile hamburger -->
            <div class="flex items-center sm:hidden">
                <button
                    @click="open = !open"
                    class="p-2 rounded-md text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 hover:bg-white/20 dark:hover:bg-gray-900/30 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div
        :class="{ 'block': open, 'hidden': !open }"
        class="hidden sm:hidden border-t border-white/20 dark:border-gray-800/60
               bg-white/70 dark:bg-gray-900/60 backdrop-blur-xl shadow-inner">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
                class="text-[15px] sm:text-base">
                🏠 {{ __('Home Page') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link
                href="/showingjobspage"
                :active="request()->is('showingjobspage')"
                class="text-[15px] sm:text-base">
                📋 Jobs
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200/60 dark:border-gray-700/60">
            <div class="px-4">
                <div class="font-medium text-base sm:text-lg text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-[13px] sm:text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link class="text-[15px] sm:text-base" :href="route('profile.edit')">
                    👤 {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link class="text-[15px] sm:text-base" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        🚪 {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
