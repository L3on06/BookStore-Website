    @section('title')
    {{$book->title}}
    @endsection

{{-- grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6
    border border-2 rounded-3xl shadow-xl
    --}}


<div class="container mx-auto my-44">
    <div class="w-full grid grid-cols-1 lg:grid-cols-2">
        <div class="drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)] hover:drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.8)]">
            <img  src="{{asset('storage/books/' .$book->image )}}" class="rounded-2xl p-2 mx-auto w-[23rem] h-[35rem] object-cover" alt="{{$book->title}}">
        </div>
     <div class="px-5 pb-5">
            <h5 class="font-serif text-5xl mt-10">{{$book->title}}</h5>

            <form action="{{route('cart.add', ['book' => $book->id])}}" method="POST">
                @csrf
                <div class="mt-10">
                    <div class="flex justify-between">
                        <input class="p-2 text-center border border-4 border-[#e6ddc4]" type="number" value="1" name="qty" id="qty" min="1" max="{{$book->qty}}"/>
                        <span class="font-bold text-2xl p-2 border border-4 border-[#e6ddc4]">In stock: {{$book->qty}}</span>
                    </div>
                    <div class="my-6 flex justify-between">
                        <span class="text-5xl font-bold text-gray-900">{{number_format($book->price, 2, '.', '')}} &euro;</span>
                        <button type="submit" class="w-1/2 py-4  text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center">Add to cart</button>
                    </div>
                </div>
                </form>

                <div class="w-full col-span-2 mt-10 shadow-lg p-5 ">
                    <h1 class="text-4xl font-serif">Description</h1>

                    <p class="py-5 text-lg ">{{$book->description}}</p>
                  </div>

            </div>






    </div>
</div>
