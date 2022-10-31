<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" class="rounded-full " href="/storage/recipes/ExUcryzQE6wA1oHuDO5Z1D1dB3YenXElOcH4ugik.png">
        <link rel="shortcut icon" class="rounded-full" href="/storage/recipes/ExUcryzQE6wA1oHuDO5Z1D1dB3YenXElOcH4ugik.png">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="" href="https://cdn.sstatic.net/Sites/es/img/favicon.ico?v=a8def514be8a%22%3E"></link>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewire('footer')
        @stack('modals')

        @livewireScripts
        <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

    </body>
</html>
