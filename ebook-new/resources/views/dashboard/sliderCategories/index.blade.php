<x-app-layout>
    @section('title', 'Slider Categories')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between">
                <a href="{{URL::previous()}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
                    <- Back
                 </a>
                <a href="{{route('sliderCategories.create')}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
                    Create Slider Category
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="relative overflow-x-auto">
                    @if($sliderCategories && count($sliderCategories) > 0)
                    <table class="w-full text-sm text-left">
        <thead class="text-center text-xs text-gray-700 uppercase bg-[#e6ddc4] text-[#6d4b2f]">
            <tr>
                <th colspan="3" class="text-xl h-14">
                    Sliders Category
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliderCategories as $sliderCategory)
            <tr class="bg-white border-b text-lg text-[#6d4b2f]">
                <th scope="row" class="px-6 py-4  ">
                    <h3>{{$sliderCategory->id}}</h3>
                </th>
                <td class="px-6 py-4 font-semibold">
                    {{$sliderCategory->name}}
                </td>

                <td class="px-6 py-4 row flex justify-around">
                        <a class="hover:font-semibold border border-transparent border-4 hover:border-b-[#6d4b2f]" href="{{ route('sliderCategories.edit', ['sliderCategory' => $sliderCategory->id]) }}">
                        <i class="fa-solid fa-pencil"></i>
                        Edit</a>
                                <form action="{{ route('sliderCategories.destroy', ['sliderCategory' => $sliderCategory->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
