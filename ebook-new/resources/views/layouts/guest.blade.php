<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title') | Book Store
        </title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @vite(['resources/css/app.css','resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

{{-- Swiper --}}
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>


    </head>
    <body class="flex flex-col h-screen justify-between">

        <nav>
            @include('component.navbar')
        </nav>

        <section class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </section>

        <footer class="p-4 bg-white sm:p-6 dark:bg-gray-900">
            @include('component.footer')
        </footer>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>

{{-- Swiper --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    </body>
</html>
