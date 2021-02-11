<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="border-2">
                    <tr class="border-2">
                        <th class="border-2 py-4 px-6">Title</th>
                        <th class="border-2 py-4 px-6">Author</th>
                        <th class="border-2 py-4 px-6">Genre</th>
                    </tr>
                    @foreach($books as $book)
                    <tr class="border-2">
                        <td class="border-2 py-4 px-6">{{ $book->title }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->author }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->genre }}</td>
                        <td class="border-2 py-4 px-6">
                            <a href="{{ route('books.show', $book) }}">Show details</a>
                        </td>
                        @if(Auth::user()->role == 'user')
                        <td class="border-2 py-4 px-6">
                            <a href="{{ route('neworder', $book->id) }}">Order book</a>
                        </td>
                        @endif
                        @if (Auth::user()->role == 'admin')
                        <td class="border-2 py-4 px-6">
                            <a href="{{ route('books.edit', $book) }}">Edit</a>
                        </td>
                        <td class="border-2 py-4 px-6">
                            <a href="{{ route('books.destroy', $book) }}" onclick="event.preventDefault(); getElementById('deleteForm').submit();">Delete</a>
                            <form id="deleteForm" action="{{ route('books.destroy', $book) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- <input type="submit" value="Delete"> --}}
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </table>
                {{-- <x-jet-welcome /> --}}
                <footer class="card-footer">
                    {{ $books->links() }}
                </footer>
            </div>
        </div>
    </div>
</x-app-layout>
