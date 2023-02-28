<x-app-layout>
    @section('title', 'Edit Book ')

    <div class="container mx-auto py-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('books.index')}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
                <- Back
             </a>
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
