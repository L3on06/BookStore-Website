<x-guest-layout>
    @section('title', 'Cart')

    {{-- @if(count(Cart::getContent()) > 0 ) --}}

    @include('component/search')
    @include('component/cart')
    @include('component/checkout')


    {{-- @else --}}
        {{-- <div class="bg-red-300 p-3 md:w-2/4 mx-auto"> --}}
            {{-- <p>Cart is empty!</p> --}}
        {{-- </div> --}}
    {{-- @endif --}}


</x-guest-layout>
