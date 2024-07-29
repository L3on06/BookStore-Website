<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href="{{url('/dashboard')}}" class="inline-block mb-5 px-6 py-3 text-[#6d4b2f] font-semibold bg-[#e6ddc4] hover:text-[#e6ddc4] hover:bg-[#6d4b2f] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg text-center">
                    <- Back
                 </a>
            <div class="bg-white overflow-hidden shadow-xl">
                <div class="relative overflow-x-auto">
@if($orders && count($orders) > 0)
 <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-center text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                 <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Full name
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Phone
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                @foreach($orders as $order)
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <h3>{{$order->id}}</h3>
                </th>
                <td class="px-6 py-4">
                                      {{$order->fullname}}
                </td>
                <td class="px-6 py-4">
                                      {{$order->email}}
                </td>
                <td class="px-6 py-4">
                                      {{$order->phone}}
                </td>
                <td class="px-6 py-4">
                                      {{ number_format($order->total, 2, '.', '')}} &euro;
                </td>
                <td></td>
                @if(Auth::user()->hasRole('admin'))
                <td class="px-6 py-4 row flex justify-around">
                                <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
  @else
        <div class="bg-[#e6ddc4] text-[#6d4b2f] flex text-center justify-between ">
            <p class="p-6 ">0 Orders</p>
            <a href="{{route('shop')}}">
                <p class="p-6 border border-[#6d4b2f] hover:bg-[#6d4b2f] hover:text-[#e6ddc4]">Go Shop</p>
                </a>
        </div>
                @endif
</div>
            </div>
        </div>
    </div>
</x-app-layout>
