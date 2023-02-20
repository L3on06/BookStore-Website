
@auth
@if(count(\Cart::getContent()) > 0)
<div class="container mx-auto p-10">
<h1 class="my-8 text-[#6d4b2f] text-3xl">Checkout</h1>

<form autocomplete="off" action="{{route('cart.checkout')}}" method="POST">
    @csrf
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="fullname" id="fullname" class="block text-[#6d4b2f] py-2.5 px-0 w-full text-lg bg-transparent border-0 border-b-2 border-[#e6ddc4] appearance-none focus:outline-none focus:ring-0 focus:border-[#6d4b2f] peer" placeholder=" " required />
        <label for="fullname" class="peer-focus:font-medium absolute text-lg text-[#6d4b2f] duration-300 transform -translate-y-6 scale-75 top-3 -z-12 origin-[0] peer-focus:left-0 peer-focus:text-[#6d4b2f] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full Name</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="email" name="email" id="email" class="block text-[#6d4b2f] py-2.5 px-0 w-full text-lg bg-transparent border-0 border-b-2 border-[#e6ddc4] appearance-none focus:outline-none focus:ring-0 focus:border-[#6d4b2f] peer" placeholder=" " required />
        <label for="email" class="peer-focus:font-medium absolute text-lg text-[#6d4b2f] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-[#6d4b2f] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
    </div>
    {{-- <div class="grid md:grid-cols-2 md:gap-6"> --}}
        {{-- </div> --}}
        <div class="relative z-0 w-full mb-6 group">
            <input type="tel" name="phone" id="phone" class="block text-[#6d4b2f] py-2.5 px-0 w-full text-lg bg-transparent border-0 border-b-2 border-[#e6ddc4] appearance-none focus:outline-none focus:ring-0 focus:border-[#6d4b2f] peer" placeholder=" " required />
            <label for="phone" class="peer-focus:font-medium absolute text-lg text-[#6d4b2f] duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-[#6d4b2f] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone</label>
        </div>
        <button type="submit" class="my-10 hover:text-[#e6ddc4] text-[#6d4b2f] bg-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-non font-medium rounded-lg text-lg w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
    </form>
</div>
@endif
@endauth
@guest
        @if(count(\Cart::getContent()) > 0)

 <p>Please <a href="{{route('login')}}">Login</a> first to checkout </p>

 @endif
@endguest
