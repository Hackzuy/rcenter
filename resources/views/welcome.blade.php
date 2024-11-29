<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex justify-between bg-gray-100 flex-col min-h-screen">
    <header class="bg-white shadow-md">
        <nav class="flex justify-between container items-center mx-auto px-4 py-4">
            <a class="font-bold text-gray-800 text-xl"href="{{ url('/') }}">Research Center</a>
            <ul class="flex space-x-4">
                @if (Route::has('login'))
                    @auth
                        <li><a class="text-gray-600 hover:text-gray-800"href="{{ url('/home') }}">Home</a></li>
                    @else
                        <li><a class="text-gray-600 hover:text-gray-800"href="{{ route('login') }}">Login</a>
                        <li><a class="text-gray-600 hover:text-gray-800"href="{{ route('register') }}">Register</a></li>
                    @endauth
                @endif
            </ul>
        </nav>
    </header>
    <main class="container mx-auto mt-8">
        <section class="px-6 rounded-lg bg-white shadow-md py-12">
            <h1 class="font-bold mb-4 text-4xl">Welcome to Research Center</h1>
            <p class="text-gray-600 text-lg">This application is designed to facilitate the management of PhD students,
                research papers, and conferences.
        </section>
        <section class="mt-12 gap-8 grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2">
            <div class="px-6 rounded-lg bg-white shadow-md py-8">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2 text-blue-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                            clip-rule="evenodd" />
                    </svg>
                    <h2 class="font-bold text-2xl">Professor Dashboard</h2>
                </div>
                <p class=text-gray-600>Professors can manage research papers, send review invitations, and oversee the
                    progress of PhD students.
            </div>
            <div class="px-6 rounded-lg bg-white shadow-md py-8">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2 text-blue-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                    </svg>
                    <h2 class="font-bold text-2xl">PhD Student Dashboard</h2>
                </div>
                <p class=text-gray-600>PhD students can submit research papers, track their progress, and receive
                    notifications about their papers.
            </div>
            <div class="px-6 rounded-lg bg-white shadow-md py-8">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2 text-blue-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd" />
                    </svg>
                    <h2 class="font-bold text-2xl">Reviewer Dashboard</h2>
                </div>
                <p class=text-gray-600>Reviewers can accept or decline review invitations, provide feedback on research
                    papers, and submit their reviews.
            </div>
            <div class="px-6 rounded-lg bg-white shadow-md py-8">
                <div class="flex items-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 mr-2 text-blue-500" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                            clip-rule="evenodd" />
                    </svg>
                    <h2 class="font-bold text-2xl">Conference Management</h2>
                </div>
                <p class=text-gray-600>Manage conferences, create calls for papers, and handle conference-related tasks.
            </div>
        </section>
        @if (Route::has('login'))
            <section class="flex justify-center mt-12">
                @auth
                    <a class="px-6 rounded-lg py-3 text-white bg-blue-500 hover:bg-blue-600"href="{{ url('/home') }}">Go to
                        Dashboard</a>
                @else
                    <a
                        class="px-6 rounded-lg py-3 text-white bg-blue-500 hover:bg-blue-600 mr-4"href="{{ route('login') }}">Login</a>
                    <a
                        class="px-6 rounded-lg py-3 text-white bg-gray-500 hover:bg-gray-600"href="{{ route('register') }}">Register</a>
                @endauth
            </section>
        @endif
    </main>
    <footer class="bg-white shadow-md mt-12 py-6">
        <div class="container mx-auto px-4">
            <p class="text-gray-600 text-center">© {{ date('Y') }} PhD Management System. All rights reserved.
        </div>
    </footer>
</body>

</html>
