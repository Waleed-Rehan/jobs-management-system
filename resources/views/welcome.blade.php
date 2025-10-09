<!DOCTYPE html>
<html lang="en" class="antialiased dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <!-- Tailwind Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = { darkMode: 'class' };
    </script>
    <style>
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fadeInUp { animation: fadeInUp 0.6s ease-out forwards; }
    </style>
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-gray-800 rounded-xl shadow-2xl p-8 text-center space-y-6 animate-fadeInUp">
        <!-- Logo above heading -->
        <div class="flex justify-center">
            <!-- Inline briefcase SVG from Heroicons -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c-1.657 0-3-1.343-3-3V5h6v3c0 1.657-1.343 3-3 3zm-6 8h12a2 2 0 002-2v-5a2 2 0 00-2-2h-1V7a2 2 0 00-2-2h-4a2 2 0 00-2 2v3H6a2 2 0 00-2 2v5a2 2 0 002 2z" />
            </svg>
        </div>
        <!-- Heading -->
        <h1 class="flex items-center justify-center text-3xl font-bold text-white">
            <!-- Inline small icon next to Welcome -->
            <svg class="h-6 w-6 text-blue-400 mr-2" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2z" />
            </svg>
            Welcome!!
        </h1>
        <h1 class="text-3xl font-bold text-blue-400">Job Board System</h1>
        <!-- Subtext -->
        <p class="text-gray-400">
            I’m Waleed and I’m honored to present this Job Management System I’ve crafted to streamline your workflow and help you stay organized. Let's get started!
        </p>
        <!-- Buttons -->
        @guest
            <div class="space-y-4">
                <a href="{{ route('login') }}" class="flex items-center justify-center w-full px-4 py-2 bg-blue-400 hover:bg-blue-500 text-white font-semibold rounded-lg shadow transition transform hover:scale-105">
                    <!-- Inline login icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                    </svg>
                    Log In
                </a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="block w-full px-4 py-2 border border-gray-100 text-gray-100 font-semibold rounded-lg hover:bg-gray-700 transition">
                    Register
                </a>
                @endif
            </div>
        @else
            <a href="{{ url('/dashboard') }}" class="inline-block px-6 py-2 bg-indigo-500 text-white font-semibold rounded-lg shadow hover:bg-indigo-600 transition">
                Go to Dashboard
            </a>
        @endguest
    </div>
</body>
</html>
