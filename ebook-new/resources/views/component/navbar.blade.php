<nav x-data="{ open: false }"
    class="container mx-auto items-center bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-900">
    <div class="flex flex-wrap justify-between">
        <a href="{{ route('home') }}" class="flex">
            <lottie-player class="logoImage"
                src="https://lottie.host/a5146218-06c1-460c-bce9-e8309b8a7bd4/8mRPp4sign.json" background="transparent"
                speed="0.5" loop autoplay></lottie-player>
            <h1 class="logoName">BookCloud</h1>
        </a>
        <div class="flex items-center md:order-2">
            <button type="button"
                class="flex mr-3 text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                @if (Auth::user())
                    @auth
                        @if (Auth::user()->profile_photo_path === 'profile-photos/no_profile_photo.png')
                            <img class="logoImage" src="{{ asset('storage/profile-photos/no_profile_photo.png') }}"
                                alt="aaa" />
                        @else
                            <img class="logoImage" src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                alt="{{ Auth::user()->name }}" />
                        @endif
                    @endauth
                @else
                    <img class="w-16 h-16  rounded-full"
                        src="{{ asset('storage/profile-photos/no_profile_photo.png') }}" alt="aaa" />
                @endif
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden text-base bg-white divide-gray-100 rounded-lg" id="user-dropdown">
                <!-- Authentication -->
                @if (Route::has('login'))
                    @auth
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                @if (Auth::user()->hasRole('admin'))
                                    <a href="{{ url('/dashboard') }}" class="linkProfile">Dashboard</a>
                                @endif
                            </li>
                            <li>
                                <a href="{{ url('/user') }}" class="linkProfile">Manage Account</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    {{-- <x-jet-dropdown-link class="linkProfile" href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link> --}}
                                    <a href="{{ route('logout') }}" class="linkProfile" @click.prevent="$root.submit();">Log
                                        Out</a>
                                </form>
                            </li>
                        </ul>
                    @else
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            <li>
                                <a href="{{ route('login') }}" class="linkProfile">Log in</a>
                            </li>
                            <li>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="linkProfile">Register</a>
                                @endif
                            </li>
                        </ul>
                    @endauth
                @endif
            </div>
            {{-- <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex p-2 text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" >
    </button> --}}
            <button data-collapse-toggle="mobile-menu-2" type="button" @click="open = ! open"
                class="inline-flex p-2 text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="mobile-menu-2" aria-expanded="false">
                <svg class="h-9 w-9 " stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
            <ul
                class="flex flex-col rounded-lg gap-6 p-5 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                <li>
                    <a href="{{ route('shop') }}"
                        class="{{ Route::currentRouteName() === 'shop' ? 'linkSelected' : '' }}  link">Shop</a>
                </li>
                <li>
                    <a href="{{ route('cart.index') }}"
                        class="{{ Route::currentRouteName() === 'cart' ? 'linkSelected' : '' }} link">Cart({{ count(\Cart::getContent()) }})</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
