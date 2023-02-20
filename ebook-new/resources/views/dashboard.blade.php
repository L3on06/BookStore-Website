<x-app-layout>
    @section('title', 'Dashboard')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
                    @role('admin')
                    <div class="p-6">
                        <div class="flex items-center">
                            <a href="{{ route('sliderCategories.index') }}"class="hover:underline hover:underline text-gray-500 hover:text-[#BA8A70] text-xl">
                                <i class="fa-solid fa-layer-group"> <span>Slider Categories ({{$sliderCategories}})</span></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <a href="{{ route('books.index') }}"class="hover:underline hover:underline text-gray-500 hover:text-[#BA8A70] text-xl">
                                <i class="fa-solid fa-book"> <span>Books ({{$books}})</span></i>
                            </a>
                        </div>
                    </div>
                     <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                        <div class="flex items-center">
                            <a href="{{ route('sliders.index') }}"class="hover:underline hover:underline text-gray-500 hover:text-[#BA8A70] text-xl">
                                <i class="fa-solid fa-clone"> <span>Slider ({{$slider}})</span></i>
                            </a>
                        </div>
                    </div>
                    @endrole
                    <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <a href="{{ route('orders.index') }}"class="hover:underline hover:underline text-gray-500 hover:text-[#BA8A70] text-xl">
                                <i class="fa-solid fa-truck-fast"> <span>Orders ({{$orders}})</span></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
