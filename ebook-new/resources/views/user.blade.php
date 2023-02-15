<x-guest-layout>

    {{-- @dd($users) --}}
    @foreach ($users as $user)
    <div class="swiper-slide drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.6)] hover:drop-shadow-[-10px_6px_12px_rgba(0,0,0,0.8)]">
    <img class="w-32 h-32  rounded-full object-cover vhover:scale-[1.05] mx-auto my-10" src="{{ asset('storage/' .Auth::user()->profile_photo_path)}}" alt="{{Auth::user()->name}}" />
        <h1>{{$user->name}}</h1>
                    <div class="p-6">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" /></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('profile.show') }}">Update profile</a></div>
                        </div>
                    </div>
                        <div class="p-6 border-t border-gray-200">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-400"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" /></svg>
                            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="{{ route('orders.index') }}">Orders</a></div>
                        </div>
                    </div>
    </div>
    @endforeach
</x-guest-layout>
