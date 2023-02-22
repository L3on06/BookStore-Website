{{-- @if(Auth::user()->hasRole('admin'))
<x-app-layout>
    @section('title', 'Books ')


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('books.create')}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
                Create Books
            </a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto">
   @if($books && count($books) > 0)
 <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-center text-lg uppercase  bg-[#e6ddc4] text-[#6d4b2f]">
            <tr>
                 <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Qty
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach($books as $book)
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <h3>{{$book->id}}</h3>
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <img class="h-14" src="{{asset('storage/books/' .$book->image )}}" alt="{{$book->title}}">
                </th>
                <td class="px-6 py-4">
                                      {{$book->title}}
                </td>
                <td class="px-6 py-4">
                                      {{$book->description}}
                </td>
                <td class="px-6 py-4">
                     {{$book->qty}}
                </td>
                <td class="px-6 py-4">
                     {{$book->price}}
                </td>
                <td class="grid text-center item-center bg-red-500">
                    <a class="hover:font-semibold border border-transparent border-4 hover:border-b-[#6d4b2f]" href="{{ route('books.edit', ['book' => $book->id]) }}">
                       <i class="fa-solid fa-pencil"></i>
                       Edit</a>
                               <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="hover:font-semibold border border-transparent border-4 hover:border-b-[#6d4b2f]">
                                       <i class="fa-solid fa-trash-can"></i>
                                       Delete</button>
                               </form>
               </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  @else
                    <p class=" p-5">0 slides</p>
                @endif
</div>
            </div>
        </div>
    </div>
</x-app-layout>

@else
<section class="w-full h-screen">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <button><a href="{{route('home')}}">Home</a></button>
    <lottie-player class="w-full" src="https://assets2.lottiefiles.com/packages/lf20_edfab5bo.json"  background="transparent" style="height: 90vh"  speed="1" loop  autoplay></lottie-player>
</section>
@endif
 --}}









@if(Auth::user()->hasRole('admin'))
<x-app-layout>
    @section('title', 'Books ')


    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <a href="{{URL::previous()}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
                    <- Back
                 </a>
                <a href="{{route('books.create')}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
                    Create Books
                </a>
            </div>
            @if($books && count($books) > 0)
        <table class="bg-white w-full overflow-hidden shadow-xl sm:rounded-lg text-[#6d4b2f]">
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
        <tbody>
            @foreach($books as $book)
            <tr class="bg-white border-b grid grid-cols-6 py-5">
                {{-- <th class="self-center"> --}}
                    {{-- <h3>{{$book->id}}</h3> --}}
                {{-- </th> --}}
                <th class="col-span-2">
                    <img class="mx-auto h-64 w-44 drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)]" src="{{asset('storage/books/' .$book->image )}}" alt="{{$book->title}}">
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
                <td class="grid gap-8 text-center self-center ">
                    <div>
                        <a class="hover:font-semibold border border-transparent border-4 hover:border-b-[#6d4b2f]" href="{{ route('books.edit', ['book' => $book->id]) }}">
                        <i class="fa-solid fa-pencil"></i>
                        Edit</a>
                    </div>
                        <form action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:font-semibold border border-transparent border-4 hover:border-b-[#6d4b2f]">
                                <i class="fa-solid fa-trash-can"></i>
                            Delete</button>
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@else
                    <p class=" p-5">0 slides</p>
                @endif
        </div>
    </div>
</x-app-layout>

@else
<section class="w-full h-screen">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <button><a href="{{route('home')}}">Home</a></button>
    <lottie-player class="w-full" src="https://assets2.lottiefiles.com/packages/lf20_edfab5bo.json"  background="transparent" style="height: 90vh"  speed="1" loop  autoplay></lottie-player>
</section>
@endif

