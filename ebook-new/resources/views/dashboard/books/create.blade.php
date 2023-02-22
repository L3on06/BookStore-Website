<x-app-layout>
    @section('title', 'Create Book ')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <form autocomplete="off" action="{{ route('books.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2">
                <div class="mx-auto">
                    <div class="drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)] py-10">
                        <img id="output" src="{{asset('storage/books/bookexample.png')}}" class="rounded-2xl mx-auto w-[15rem] h-[24rem] object-cover" alt="preview">
                    </div>
                    <input class="" type="file" name="image" onchange="loadFile(event)"/>
                </div>
                <div>
                    <div class="grid grid-cols-2 pt-10 gap-5">
                        <input class=" border-none focus:ring-0 col-span-2 font-serif text-3xl" type="text" name="title" placeholder="Add title" required />
                        <input class=" border-none focus:ring-0 col-span-2  border border-4 border-[#e6ddc4]" type="text" name="qty" placeholder="Add qty" required />
                        <input class=" border-none focus:ring-0" type="text" name="price" placeholder="Add price" required />
                        <button class="border-none focus:ring-0 py-4 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] rounded-lg text-sm text-center" type="submit">Add new book</button>
                    </div>
                    <div class="w-full col-span-2 mt-10 shadow-lg p-5 ">
                        <h1 class="text-4xl font-serif">Description</h1>
                        <textarea class="w-full h-64  border-none focus:ring-0" type="text" name="description" placeholder="Add description" required></textarea>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>

    {{-- Preview image --}}
    @section('js')
    var loadFile = function(event){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };


    @endsection
</x-app-layout>


