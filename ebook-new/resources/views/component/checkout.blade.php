
@auth
@if(count(\Cart::getContent()) > 0)
<div class="container mx-auto">
<h1 class="my-8 text-[#6d4b2f] text-3xl">Checkout</h1>

<form action="{{route('cart.checkout')}}" method="POST">
    @csrf
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="fullname" id="fullname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="fullname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full Name</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
    </div>
    {{-- <div class="grid md:grid-cols-2 md:gap-6"> --}}
        {{-- </div> --}}
        <div class="relative z-0 w-full mb-6 group">
            <input type="tel" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone</label>
        </div>
        <button type="submit" class="my-10 hover:text-[#e6ddc4] text-[#6d4b2f] bg-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
    </form>
</div>
@endif
@endauth
@guest
        @if(count(\Cart::getContent()) > 0)

 <p>Please <a href="{{route('login')}}">Login</a> first to checkout </p>
   {{-- <div class="flex justify-end mt-4 space-x-2">
          <button class="px-6 py-3 text-sm text-gray-800 bg-gray-200 hover:bg-gray-400">
            Cannel
          </button>
          <button class="px-6 py-3 text-sm text-white bg-indigo-500 hover:bg-indigo-600">
            Checkout
          </button>
        </div> --}}
 @endif
@endguest
