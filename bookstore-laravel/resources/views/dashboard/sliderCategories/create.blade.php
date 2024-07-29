<x-app-layout>
    @section('title', 'Create Slider Category ')

    <div class="p-10 container mx-auto">
        <a href="{{route('sliderCategories.index')}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
            <- Back
         </a>
           <form autocomplete="off" action="{{ route('sliderCategories.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Slider category name" class="text-[#6d4b2f] w-1/2 p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border-l-2 border border-[#6d4b2f] focus:ring-[#6d4b2f] focus:border-[#6d4b2f]" />
                <button type="submit" class="inline-block mb-5 ml-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-lg text-center">
                    Submit
                </button>
           </form>
           @if ($errors->any())
           <div class="font-semibold text-lg text-[#6d4b2f]">
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
    </div>
</x-app-layout>
