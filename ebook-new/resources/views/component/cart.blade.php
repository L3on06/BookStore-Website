  <div class="container p-2 mx-auto mt-10 bg-white p-10 ">
      <div class="w-full overflow-x-auto">
        @if(count(\Cart::getContent()) > 0)
        @if(Session::has('status'))
        {{Session::get('status')}}
        @endif
        <table class=" w-full shadow-inner my-20">
          <thead>
            <tr class="bg-[#e6ddc4] text-[#6d4b2f]">
              <th class=" py-3 font-bold text-xl">Image</th>
              <th class=" py-3 font-bold text-xl">Title</th>
              <th class=" py-3 font-bold text-xl">Qty</th>
              <th class=" py-3 font-bold text-xl">Price</th>
            </tr>
          </thead>
          <tbody>
              @foreach(\Cart::getContent() as $item)
            <tr>
            <td class="p-4 grid place-content-center ">
                <img class="h-56" src="{{asset('storage/books/' .$item->associatedModel->image )}}" alt="{{$item->name}}">
            </td>
            <td class="p-4 text-3xl text-[#6d4b2f] text-center">{{$item->name}} </td>

              <td class="p-4 text-center">
                <div>
                  <button class="px-4 shadow"><a href="{{route('cart.decrease', ['item' => $item->id])}}">-</a></button>
                  <input
                    type="text"
                    name="qty"
                    value="{{$item->quantity}}"
                    class="w-16 text-2xl text-center bg-[#e6ddc4] text-[#6d4b2f] outline-none"
                  />
                  <button class="px-4 shadow"><a href="{{route('cart.increase', ['item' => $item->id])}}">+</a></button>
                </div>
              </td>
              <td class="p-4 px-6 text-center text-3xl text-[#6d4b2f]">{{number_format($item->quantity * $item->price, 2, '.', '')}} &euro;</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot class="bg-[#e6ddc4] text-[#6d4b2f]">
            <td class="text-4xl" colspan="3"><strong>Total</strong></td>
            <td class="p-2 float-right text-3xl"><strong>{{number_format(\Cart::getTotal(), 2, '.', '')}} &euro;</strong></td>
        </tfoot>
    </table>
    @auth
    <div class="flex justify-end mt-4 p-5">
        <a href="{{route('checkout')}}" class="px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
          Checkout
        </a>
  </div>
  @endauth
  @guest

  <a href="{{route('login')}}" class="inline-block rounded-xl py-3 px-5 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-lg">Please Login first to checkout </a>

  @endguest
        @else
        <div class="bg-[#e6ddc4] text-[#6d4b2f] flex text-center justify-between ">
            <p class="p-6 ">Cart is empty</p>
            <a href="{{route('shop')}}">
                <p class="p-6 border border-[#6d4b2f] hover:bg-[#6d4b2f] hover:text-[#e6ddc4]">Go Shop</p>
                </a>
        </div>
        @endif
    </div>
</div>
