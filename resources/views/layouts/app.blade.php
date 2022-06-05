<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>@yield('pageTitle')</title>
</head>
<body class="text-white bg-gray-900">
    <header class="border-b border-gray-800">
        <nav class="container flex flex-col items-center justify-between px-4 py-6 mx-auto lg:flex-row">
            <div class="flex flex-col items-center lg:flex-row">
                <a href="/">
                    <img src="/laracasts-logo.svg" alt="Logo" class="flex-none w-32">
                    <ul class="flex mt-6 ml-0 space-x-8 lg:ml-16 md:mt-0">
                    </ul>
                </a>
            </div>
            <div class="flex items-center mt-6 lg:mt-0">
                <livewire:search-dropdown>
                <div class="ml-6">
                    <a href="#">
                        <img src="/avatar.jpg" alt="avatar" class="w-8 rounded-full">
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main class="py-8">
        @yield('content')
    </main>

    <footer class="border-t border-gray-800">
        <div class="container px-4 py-6 mx-auto">
            Powered by <a href="#" class="underline hover:text-gray-400">IGDB API</a>
        </div>
    </footer>
    @livewireScripts
    <script src="/js/app.js"></script>
    @stack('scripts')
</body>
</html>