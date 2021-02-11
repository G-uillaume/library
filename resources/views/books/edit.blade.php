<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                @foreach($errors->bookCreation->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                <form class="p-4 action="{{ route('books.update', $book) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <p>
                        <label for="title">Title : </label>
                        <input type="text" name="title" id="title" value="{{ $book->title }}">
                    </p>
                    <p>
                        <label for="author">Author : </label>
                        <input type="text" name="author" id="author" value="{{ $book->author }}">
                    </p>
                    <p>
                        <label for="genre">Genre : </label>
                        <input type="text" name="genre" id="genre" value="{{ $book->genre }}">
                    </p>
                    <p>
                        <label for="page_number">Number of pages : </label>
                        <input type="number" name="page_number" id="page_number" value="{{ $book->page_number }}">
                    </p>
                    <p>
                        <label for="publisher">Publisher : </label>
                        <input type="text" name="publisher" id="publisher" value="{{ $book->publisher }}">
                    </p>
                    <p>
                        <label for="quantity">Quantity : </label>
                        <input type="number" name="quantity" id="quantity" value="{{ $book->quantity }}">
                    </p>
                    <p>
                        <label for="description">Description : </label>
                        <textarea name="description" id="description" cols="30"
                            rows="10">{{ $book->description }}</textarea>
                    </p>
                    <input class="p-2 rounded" type="submit" value="Validate">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
