<x-app-layout>
    @section('title', 'Edit Book ')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" placeholder="Enter title"  value="{{$book->title}}"/>
            <input type="text" name="description" placeholder="Enter description"  value="{{$book->description}}"/>
            <input type="text" name="qty" placeholder="Enter qty"  value="{{$book->qty}}"/>
            <input type="text" name="price" placeholder="Enter price"/>
            <select name="slider_category_id">
                <option style="display: none"></option>
                @foreach($sliders as $slider)
                <option value="{{$slider->id}}"
                    @if($book->slider_category_id === $slider->id)
                    selected='selected'
                    @endif
                    >
                    {{$slider->name}}
                </option>
                @endforeach
            </select>

            <input type="file" name="image" />
            <div>
                <h1>Current Image:</h1>
                <img class="h-32" src="{{asset('storage/books/' .$book->image )}}" alt="{{$book->title}}">
            </div>
            <button type="submit">Submit</button>
           </form>
        </div>
    </div> --}}



    <div class="container mx-auto py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <form autocomplete="off" action="{{ route('books.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2">
                <div class="mx-auto">
                    <div class="drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)] py-10">
                        <img id="output" src="{{asset('storage/books/' .$book->image )}}" class="rounded-2xl mx-auto w-[15rem] h-[24rem] object-cover" alt="preview">
                    </div>
                    <input class="" type="file" name="image" onchange="loadFile(event)"/>
                </div>
                <div>
                    <div class="grid grid-cols-2 pt-10 gap-5">
                        <textarea id="my-text" class="resize-none   border-none focus:ring-0 col-span-2 font-serif text-3xl" type="text" name="title" placeholder="Add title" required>{{$book->title}} </textarea>
                        <input class=" font-bold text-xl border-none focus:ring-0 border border-4 border-[#e6ddc4]" type="text" name="qty" placeholder="Add qty" value="{{$book->qty}}" required />
                        <select name="slider_category_id" class="text-[#6d4b2f] font-semibold bg-[#e6ddc4]">
                            <option style="display: none"></option>
                            @foreach($sliders as $slider)
                            <option value="{{$slider->id}}"
                                @if($book->slider_category_id === $slider->id)
                                selected='selected'
                                @endif
                                >
                                {{$slider->name}}
                            </option>
                            @endforeach
                        </select>
                        <input class=" font-bold text-xl border-none focus:ring-0" type="text" name="price" placeholder="Add price" value="{{number_format($book->price, 2, '.', '')}}" required />
                        <button class="border-none focus:ring-0 py-4 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] rounded-lg text-sm text-center" type="submit">Update book</button>
                    </div>
                    <div class="w-full col-span-2 mt-10 shadow-lg p-5 ">
                        <h1 class="text-4xl font-serif">Description</h1>

                        <textarea class="w-full h-64  border-none focus:ring-0" type="text" name="description" placeholder="Add description" required>{{$book->description}}</textarea>
                    </div>
                </div>
            </div>
            </form>
        </div>

    </div>
    @section('js')
    var loadFile = function(event){
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };




    @endsection
</x-app-layout>
