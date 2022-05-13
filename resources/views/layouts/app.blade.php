<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Video Game Aggregator</title>
</head>
<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="flex flex-col lg:flex-row items-center justify-between container px-4 py-6 mx-auto">
            <div class="flex flex-col lg:flex-row items-center">
                <a href="/">
                    <img src="/laracasts-logo.svg" alt="Laracasts Logo" class="flex-none w-32">
                    <ul class="flex ml-0 mt-6 lg:ml-16 md:mt-0 space-x-8">
                        <li><a href="#" class="hover:text-gray-400">Games</a></li>
                        <li><a href="#" class="hover:text-gray-400">Reviews</a></li>
                        <li><a href="#" class="hover:text-gray-400">Coming Soon</a></li>
                    </ul>
                </a>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                <div class="relative">
                    <input
                        type="text"
                        class="bg-gray-800 text-sm rounded-full w-64 px-3 pl-8 py-1 focus:outline-none focus:shadow-outline"
                        placeholder="Search..."
                    >
                    <div class="flex items-center h-full ml-2 absolute top-0">
                        a
                    </div>
                </div>
                <div class="ml-6">
                    <a href="#">
                        <img src="/avatar.jpg" alt="avatar" class="rounded-full w-8">
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-800">
        <div class="container mx-auto px-4 py-6">
            Powered by <a href="#" class="underline hover:text-gray-400">IGDB API</a>
        </div>
    </footer>
</body>
</html>