<x-app-layout>
    @section('title', 'Slider Categories')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="inline-block px-6 mb-5 py-3 text-sm text-white bg-indigo-500 hover:bg-indigo-600" href="{{route('sliderCategories.create')}}">Create Sliders</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto">
@if($sliderCategories && count($sliderCategories) > 0)
 <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Sliders Category
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach($sliderCategories as $sliderCategory)
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <h3>{{$sliderCategory->id}}</h3>
                </th>
                <td class="px-6 py-4">
                                      {{$sliderCategory->name}}
                </td>

                <td class="px-6 py-4 row flex justify-around">
                     <a href="{{ route('sliderCategories.edit', ['sliderCategory' => $sliderCategory->id]) }}"> Edit</a>
                                <form action="{{ route('sliderCategories.destroy', ['sliderCategory' => $sliderCategory->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
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
