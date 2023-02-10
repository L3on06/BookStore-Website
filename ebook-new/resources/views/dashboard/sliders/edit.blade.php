<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sliders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           <form action="{{ route('sliders.update', ['slider' => $slider->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="text" name="name" placeholder="Enter name" value="{{$slider->name}}"/>
            <button type="submit">Submit</button>

           </form>
        </div>
    </div>
</x-app-layout>
