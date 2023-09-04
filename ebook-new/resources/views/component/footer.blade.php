    <div class="container p-4 mx-auto my-10 md:flex md:justify-between">
        <div>
            <a href="https://flowbite.com/" class="flex items-center md:flex-col lg:flex-row">
                <lottie-player class="footerImage"
                    src="https://lottie.host/a5146218-06c1-460c-bce9-e8309b8a7bd4/8mRPp4sign.json"
                    background="transparent" speed="0.5" loop autoplay></lottie-player>
                <h1 class="logoName">Book Store</h1>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-6 sm:gap-0 sm:grid-cols-3">
            <div>
                <h3 class="mb-6 text-xl font-semibold text-gray-900 uppercase">Pages</h3>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                        <a href="{{ route('home') }}"
                            class="hover:underline text-gray-500 hover:text-[#BA8A70]">
                            <i class="fa-solid fa-house-chimney"> <span>Home</span></i>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a
                            href="{{ route('shop') }}"class="hover:underline hover:underline text-gray-500 hover:text-[#BA8A70]">
                            <i class="fa-solid fa-store"> <span>Shop</span></i>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a
                            href="{{ route('cart.index') }}"class="hover:underline hover:underline text-gray-500 hover:text-[#BA8A70]">
                            <i class="fa-solid fa-basket-shopping"> <span>Cart</span></i>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a
                            href="{{ route('orders.index') }}"class="hover:underline hover:underline text-gray-500 hover:text-[#BA8A70]">
                            <i class="fa-solid fa-truck-fast"> <span>Orders</span></i>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a
                            href="{{ route('user') }}"class="hover:underline hover:underline text-gray-500 hover:text-[#BA8A70]">
                            <i class="fa-regular fa-id-card"> <span>Menage Profile</span></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-xl font-semibold text-gray-900 uppercase">Contact Us</h2>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                        <a href="https://github.com/L3on06" class="hover:underline text-gray-500 hover:text-black">
                            <i class="fa-brands fa-github"> <span>Github</span></i>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="https://www.facebook.com"
                            class="hover:underline inline-block hover:text-transparent bg-clip-text text-gray-500 hover:bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
                            <i class="fa-brands fa-instagram"> <span>Instagram</span></i>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="https://www.facebook.com" class="hover:underline text-gray-500 hover:text-indigo-700">
                            <i class="fa-brands fa-discord"> <span>Discords</span></i>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="https://www.facebook.com" class="hover:underline text-gray-500 hover:text-blue-600">
                            <i class="fa-brands fa-facebook"> <span>Facebook</span></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-xl font-semibold text-gray-900 uppercase">Legal</h2>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                        <a href="#" class="hover:underline text-gray-500 hover:text-[#BA8A70]">
                            <i class="fa-solid fa-lock"> <span>Privacy Policy</span></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline text-gray-500 hover:text-[#BA8A70]">
                            <i class="fa-solid fa-book"> <span>Terms &amp; Conditions</span></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container p-5 mx-auto  sm:flex text-center sm:justify-between">
        <span class="container mx-auto text-sm text-gray-900 text-center">© 2023 <a href="https://flowbite.com/"
                class="hover:underline">Book Store™</a>. All Rights Reserved.
    </div>
