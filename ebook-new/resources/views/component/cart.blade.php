  {{-- <div class="container p-2 mx-auto mt-6 bg-white">
      <div class="w-full overflow-x-auto">
        <div class="my-2">
          <h3 class="text-xl font-bold tracking-wider">Shopping Cart 3 item</h3>
        </div>
        <table class="w-full shadow-inner">
          <thead>
            <tr class="bg-gray-100">
              <th class="px-6 py-3 font-bold whitespace-nowrap">Image</th>
              <th class="px-6 py-3 font-bold whitespace-nowrap">Title</th>
              <th class="px-6 py-3 font-bold whitespace-nowrap">Qty</th>
              <th class="px-6 py-3 font-bold whitespace-nowrap">Price</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="p-4 text-center whitespace-nowrap"><img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt=""></td>
              <td class="p-4  text-center whitespace-nowrap">Apple </td>

              <td class="p-4 text-center whitespace-nowrap">
                <div>
                  <button class="px-2 py-0 shadow">-</button>
                  <input
                    type="text"
                    name="qty"
                    value="2"
                    class="w-12 text-center bg-gray-100 outline-none"
                  />
                  <button class="px-2 py-0 shadow">+</button>
                </div>
              </td>
              <td class="p-4 px-6 text-center whitespace-nowrap">$1,000</td>
            </tr>
        </tbody>
    </table>
        <div class="flex justify-end mt-4 space-x-2">
            <button
            class="
            px-6
            py-3
            text-sm text-gray-800
            bg-gray-200
            hover:bg-gray-400
            "
            >
            Cannel
          </button>
          <button
            class="
            px-6
              py-3
              text-sm text-white
              bg-indigo-500
              hover:bg-indigo-600
            "
          >
            Proceed to Checkout
          </button>
        </div>
    </div>
</div> --}}

{{-- <td class="p-4 px-6 text-center whitespace-nowrap">
  <button class="px-2 py-0 text-red-100 bg-red-600 rounded">
    x
  </button>
</td> --}}


  <div class="container p-2 mx-auto mt-6 bg-white">
      <div class="w-full overflow-x-auto">
        @if(count(\Cart::getContent()) > 0)
        @if(Session::has('status'))
        {{Session::get('status')}}
        @endif
        <table class="w-full shadow-inner ">
          <thead>
            <tr class="bg-gray-100">
              <th class=" py-3 font-bold">Image</th>
              <th class=" py-3 font-bold">Title</th>
              <th class=" py-3 font-bold">Qty</th>
              <th class=" py-3 font-bold">Price</th>
            </tr>
          </thead>
          <tbody>
              @foreach(\Cart::getContent() as $item)
            <tr>
            <td class="p-4 grid place-content-center ">
                <img class="h-32" src="{{asset('storage/books/' .$item->associatedModel->image )}}" alt="{{$item->name}}">
            </td>
            <td class="p-4 ">{{$item->name}} </td>

              <td class="p-4 text-center ">
                <div>
                  <button class="px-2  shadow"><a href="{{route('cart.decrease', ['item' => $item->id])}}">-</a></button>
                  <input
                    type="text"
                    name="qty"
                    value="{{$item->quantity}}"
                    class="w-12 text-center bg-gray-100 outline-none"
                  />
                  <button class="px-2  shadow"><a href="{{route('cart.increase', ['item' => $item->id])}}">+</a></button>
                </div>
              </td>
              <td class="p-4 px-6 text-center ">{{number_format($item->quantity * $item->price, 2, '.', '')}} &euro;</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>{{number_format(\Cart::getTotal(), 2, '.', '')}} &euro;</strong></td>
        </tfoot>
    </table>
        @else
        <p>Cart is empty</p>
        @endif
    </div>
</div>
