<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($orders as $order)
                <h3 class="text-2xl m-6">Order n°{{ $order->id }}, {{ $order->user->name }} :  </h3>
                @foreach($order->books as $book)
                <ul class="m-2">
                    <li>{{ $book->id }} : {{ implode(' ', (array_reverse(explode(', ',$book->title)))) }} ({{ implode(' ', (array_reverse(explode(', ',$book->author)))) }})</li>
                </ul>
                @endforeach
                <a href="{{ route('orders.edit', $order) }}">Edit order</a>
                <a href="{{ route('orders.destroy', $order) }}" onclick="event.preventDefault(); getElementById('deleteOrder').submit();">Delete order</a>
                <form id="deleteOrder" action="{{ route('orders.destroy', $order) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- <input type="submit" value="Delete"> --}}
                </form>
                @endforeach
                {{-- <x-jet-welcome /> --}}
            </div>
        </div>
    </div>
</x-app-layout>
