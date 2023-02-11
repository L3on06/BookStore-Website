<x-app-layout>
    @section('title', 'Create Slider Category ')


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sliders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @if(Session::has('status'))
                {{Session::get('status')}}
            @endif

           <form action="{{ route('sliderCategories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Enter name" />
            <button type="submit">Submit</button>
           </form>
        </div>
    </div>
</x-app-layout>
