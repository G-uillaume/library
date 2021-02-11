<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg flex-col justify-center items-center">
                {{-- <x-jet-welcome /> --}}
                <h1 class="text-3xl text-center mt-4">Your choice</h1>
                <table class="m-auto">
                    <tr>
                        <th class="border-2 py-4 px-6">Title</th>
                        <th class="border-2 py-4 px-6">Author</th>
                        <th class="border-2 py-4 px-6">Genre</th>
                        <th class="border-2 py-4 px-6">Description</th>
                        <th class="border-2 py-4 px-6">Pages</th>
                        <th class="border-2 py-4 px-6">Publisher</th>
                        <th class="border-2 py-4 px-6">Quantity</th>
                    </tr>
                    <tr>
                        <td class="border-2 py-4 px-6">{{ $book->title }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->author }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->genre }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->description }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->page_number }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->publisher }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->quantity }}</td>
                    </tr>
                </table>
                {{-- @if ($role == 'admin')
                <a href="{{ route('books.create') }}">Create book card</a>
                @endif --}}
                <h2 class="text-3xl text-center mt-4">Suggestions</h2>
                <h3 class="text-3xl text-center mt-4">From the author</h3>
                <table class="m-auto">
                    <tr>
                        <th class="border-2 py-4 px-6">Title</th>
                        <th class="border-2 py-4 px-6">Author</th>
                        <th class="border-2 py-4 px-6">Genre</th>
                    </tr>
                    @foreach($author as $book)
                    <tr>
                        <td class="border-2 py-4 px-6">{{ $book->title }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->author }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->genre }}</td>
                        <td class="border-2 py-4 px-6"><a href="{{ route('books.show', $book) }}">Show details</a></td>
                    </tr>
                    @endforeach
                </table>
                <h3 class="text-3xl text-center mt-4">From the same genre</h3>
                <table class="m-auto">
                    <tr>
                        <th class="border-2 py-4 px-6">Title</th>
                        <th class="border-2 py-4 px-6">Author</th>
                        <th class="border-2 py-4 px-6">Genre</th>
                    </tr>
                    @foreach($genre as $book)
                    <tr>
                        <td class="border-2 py-4 px-6">{{ $book->title }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->author }}</td>
                        <td class="border-2 py-4 px-6">{{ $book->genre }}</td>
                        <td class="border-2 py-4 px-6"><a href="{{ route('books.show', $book) }}">Show details</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
