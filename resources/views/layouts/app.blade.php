<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-row">

        <!-- Sidebar -->
        <div id="sidebar"
            class="bg-gray-800 text-white flex flex-col w-64 space-y-6 absolute inset-y-0 left-0 transform -translate-x-full transition duration-200 ease-in-out md:relative md:translate-x-0 md:flex">

            <!-- Header di Sidebar untuk Mobile: Nama Aplikasi + Tombol X -->
            <div class="flex justify-between items-center p-6">
                <!-- Nama Aplikasi tanpa logo -->
                <span class="text-xl font-semibold">{{ config('app.name', 'Laravel') }}</span>

                <!-- Tombol X (Close Sidebar Button) untuk Mobile -->
                <button id="close-sidebar" class="text-white focus:outline-none md:hidden">
                    <!-- Icon X to close the sidebar -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Menu Sidebar -->
            <nav class="flex-1 px-4">
                <ul class="space-y-4">
                    <li><a href="{{ route('dashboard') }}" class="block py-2 px-4 bg-gray-700 rounded-md">Dashboard</a>
                    </li>
                    <li><a href="#" class="block py-2 px-4 rounded-md hover:bg-gray-700">Produk</a></li>
                    <li><a href="#" class="block py-2 px-4 rounded-md hover:bg-gray-700">Admin</a></li>
                </ul>
            </nav>

            <!-- Logout Button -->
            <div class="p-4 text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md w-full">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navbar -->
            <header
                class="w-full bg-gray-800 md:bg-white text-white md:text-gray-800 p-4 flex justify-between items-center">
                <!-- Burger Button for Mobile -->
                <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
                    <!-- Icon burger (Hamburger menu) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- User Dropdown -->
                <div class="flex items-center ml-auto">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div class="hidden sm:block">{{ Auth::user()->name }}</div>
                                <div class="block sm:hidden">
                                    <svg class="w-8 h-8 text-gray-500 dark:text-gray-400"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zm0 2c-3.39 0-6 2.64-6 6v1h12v-1c0-3.36-2.61-6-6-6z" />
                                    </svg>
                                </div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </header>


            <!-- Page Content -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>

    <!-- Scripts for Sidebar Toggle -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('menu-toggle');
        const closeButton = document.getElementById('close-sidebar');

        // Toggle sidebar on burger button click
        toggleButton.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });

        // Close sidebar on X button click
        closeButton.addEventListener('click', function() {
            sidebar.classList.add('-translate-x-full');
        });
    </script>
</body>

</html>
