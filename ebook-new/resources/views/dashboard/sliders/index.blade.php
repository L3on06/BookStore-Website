<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="inline-block px-6 mb-5 py-3 text-sm text-white bg-indigo-500 hover:bg-indigo-600" href="{{route('sliders.create')}}">Create Sliders</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto">
{{-- @if($sliders && count($sliders) > 0) --}}
@foreach($sliders as $slider)
@foreach($books as $book)
@if($book->slider_category_id === $slider->id)
 <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                <td class="px-6 py-4 row flex justify-around">
                    <form action="{{ route('deleteSlider', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                 </form>
                </td>
            </tr>

            {{-- @endif --}}
            @else
                <p class=" p-5">0 slides</p>
            @endif
            @endforeach
            @endforeach
        </tbody>
    </table>
</div>
            </div>
        </div>
    </div>
</x-app-layout>
