<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Title --}}
        <title>@yield('title') | Book Store</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        @vite(['resources/css/app.css','resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        {{-- Swiper --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>




<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">



        {{-- Google foonts  --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Alice&display=swap" rel="stylesheet">

    </head>
    <body class="flex flex-col h-screen">


        {{-- Navbar --}}
        <nav class="h-auto"> @include('component.navbar') </nav>

        {{-- Main Section --}}
        <main class="mb-auto"> @yield('content') </main>

        {{-- Footer --}}
        <footer class="footer"> @include('component.footer') </footer>



        {{-- Flowbite --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
        {{-- Swiper --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        {{-- Cuztom js --}}
        <script> @yield('js');</script>
    </body>
</html>
