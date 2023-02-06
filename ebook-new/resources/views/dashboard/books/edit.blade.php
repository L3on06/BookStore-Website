<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <form action="{{ route('books.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="title" placeholder="Enter title"  value="{{$book->title}}"/>
            <input type="text" name="description" placeholder="Enter description"  value="{{$book->description}}"/>
            <input type="text" name="qty" placeholder="Enter qty"  value="{{$book->qty}}"/>
            <input type="text" name="price" placeholder="Enter price" value="{{$book->price}}"/>
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
    </div>
</x-app-layout>
