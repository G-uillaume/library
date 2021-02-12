<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="height: 500px;" class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form class="m-auto" action="{{ route('orders.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <p>
                        <label for="books">Books (keep pressing ctrl for pultiple choice) : </label>
                    </p>
                    <p>
                        <select name="books[] " id="books" multiple>
                            @foreach($books as $book)
                            <option value="{{$book->id}}">{{ implode(' ', (array_reverse(explode(', ',$book->title)))) }}, {{ implode(' ', (array_reverse(explode(', ',$book->author)))) }}</option>
                            @endforeach
                        </select>
                    </p>
                    <input class="p-2 m-2 rounded" type="submit" value="Order now">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
