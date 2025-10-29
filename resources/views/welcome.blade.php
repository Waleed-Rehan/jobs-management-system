<!DOCTYPE html>
<html lang="en" class="antialiased dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = { darkMode: 'class' };
    </script>
    <style>
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeInUp {
            animation: fadeInUp 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 flex items-center justify-center min-h-screen text-white">
    <div class="w-full max-w-lg bg-white/10 backdrop-blur-md border border-white/20 dark:border-gray-700 rounded-2xl shadow-2xl p-8 text-center space-y-6 animate-fadeInUp">

        <!-- Logo -->
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c-1.657 0-3-1.343-3-3V5h6v3c0 1.657-1.343 3-3 3zm-6 8h12a2 2 0 002-2v-5a2 2 0 00-2-2h-1V7a2 2 0 00-2-2h-4a2 2 0 00-2 2v3H6a2 2 0 00-2 2v5a2 2 0 002 2z" />
            </svg>
        </div>

        <!-- Headings -->
        <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 via-pink-500 to-red-500">
            Welcome to Your Job Portal
        </h1>
        <h2 class="text-xl font-semibold text-gray-300">Crafted by Waleed </h2>

        <!-- Subtext -->
        <p class="text-sm text-gray-400 leading-relaxed">
            This system is built to help you manage job listings with clarity, elegance, and full control. Whether you're hiring or applying, you're in the right place.
        </p>

        <!-- Buttons -->
        @guest
            <div class="space-y-4">
                <a href="{{ route('login') }}" class="flex items-center justify-center w-full px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-full shadow transition transform hover:scale-105">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                    Log In
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="block w-full px-4 py-2 border border-white/20 text-gray-100 font-semibold rounded-full hover:bg-white/10 transition">
                        Register
                    </a>
                @endif
            </div>
        @else
            <a href="{{ url('/dashboard') }}" class="inline-block px-6 py-2 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-semibold rounded-full shadow hover:from-indigo-600 hover:to-purple-700 transition">
                Go to Dashboard
            </a>
        @endguest
    </div>
</body>
</html>
