<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="inline-block px-6 mb-5 py-3 text-sm text-white bg-indigo-500 hover:bg-indigo-600" href="{{route('orders.index')}}">Create orders</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                <td class="px-6 py-4 row flex justify-around">
                                <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  @else
                    <p class=" p-5">0 slides</p>
                @endif
</div>
            </div>
        </div>
    </div>
</x-app-layout>
