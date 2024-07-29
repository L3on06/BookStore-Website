<x-guest-layout>

    {{-- @dd($users) --}}
    @foreach ($users as $user)
    <div>
        <img class="w-52 h-52 rounded-full object-cover vhover:scale-[1.05] mx-auto mt-10" src="{{ asset('storage/' .Auth::user()->profile_photo_path)}}" alt="{{Auth::user()->name}}" />
        <h1 class="text-2xl font-bold text-center p-2">{{$user->name}}</h1>
    <div class="flex justify-between w-1/2 mx-auto">
                    <div class="p-10">
                        <div class="flex items-center">
                            <a href="{{ route('profile.show') }}"class="hover:underline text-black hover:text-[#BA8A70] text-xl">
                                <i class="fa-solid fa-user"> <span>Update profile</span></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-10">
                        <div class="flex items-center">
                            <a href="{{ route('orders.index') }}"class="hover:underline text-black hover:text-[#BA8A70] text-xl">
                                <i class="fa-solid fa-truck-fast"> <span>Orders</span></i>
                            </a>
                        </div>
                    </div>
    </div>

    </div>
    @endforeach
</x-guest-layout>
