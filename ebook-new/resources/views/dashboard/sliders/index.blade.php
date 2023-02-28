<x-app-layout>
    @section('title', 'Slider')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{url('/dashboard')}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
                <- Back
             </a>
        @if($sliders && count($sliders) > 0)
                    <table class="w-full bg-white overflow-hidden shadow-xl sm:rounded-lg text-[#6d4b2f]">
                        <thead class="text-center text-lg uppercase bg-[#e6ddc4] text-[#6d4b2f]">
                            <tr class="grid grid-cols-6 p-5">
                                {{-- <th> --}}
                                    {{-- # --}}
                                {{-- </th> --}}
                                <th class="col-span-2">
                                    Image
                                </th>
                                <th>
                                    Title
                                </th>
                                {{-- <th> --}}
                                    {{-- Description --}}
                                {{-- </th> --}}
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                </th>
                            </tr>
                        </thead>
        @foreach($sliders as $slider)
        @foreach($books as $book)
        @if($book->slider_category_id === $slider->id)
        @if(!empty($book->slider_category_id))
        <tbody>
            <tr class="bg-white border-b grid grid-cols-6 py-5">
                {{-- <th class="self-center"> --}}
                    {{-- <h3>{{$book->id}}</h3> --}}
                {{-- </th> --}}
                <th class="col-span-2">
                    <img class="mx-auto h-64 w-44  drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)]" src="{{asset('storage/books/' .$book->image )}}" alt="{{$book->title}}">
                </th>
                <td class="font-semibold text-lg self-center">
                    {{$book->title}}
                </td>
                {{-- <td class=""> --}}
                    {{-- {{$book->description}} --}}
                {{-- </td> --}}
                <td class="font-semibold text-lg text-center self-center">
                    {{$book->qty}}
                </td>
                <td class="font-semibold text-lg text-center self-center">
                    {{number_format($book->price, 2, '.', '')}} &euro;
                </td>
                <td class="grid gap-8 text-center self-center">
                        <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:font-semibold border border-transparent border-4 hover:border-b-[#6d4b2f]">
                                <i class="fa-solid fa-trash-can"></i>
                            Delete</button>
                        </form>
                </td>
            </tr>
        </tbody>
            @else
                <p class=" p-5">0 slides</p>
            @endif
            @endif
            @endforeach
            @endforeach
            @endif

    </table>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
