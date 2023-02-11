<x-app-layout>
    @section('title', 'Create Book ')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Books') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <form action="{{ route('books.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Enter title" required />
            <textarea type="text" name="description" placeholder="Enter description" required></textarea>
            <input type="text" name="qty" placeholder="Enter qty" required />
            <input type="text" name="price" placeholder="Enter price" required />
            <input type="file" name="image" />
            <button type="submit">enter</button>
           </form>
        </div>
    </div>
</x-app-layout>
