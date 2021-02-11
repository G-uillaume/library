<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use App\Http\Requests\StoreBookRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all()->sortBy('title');
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->role == 'admin') {
            return view('books.create');
        } else {
            return view('notAdmin');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'page_number' => $request->page_number,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Book $book) 
    {
        $genre = Book::where('genre', $book->genre)->inRandomOrder()->take(3)->get();
        $author = Book::where('author', $book->author)->inRandomOrder()->take(3)->get();
        $role = $request->user()->role;
        return view('books.show', [
            'book' => $book,
            'author' => $author,
            'genre' => $genre,
            'role' => $role
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBookRequest $request, Book $book)
    {
        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'genre' => $request->genre,
            'page_number' => $request->page_number,
            'publisher' => $request->publisher,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete($book);
        return redirect()->route('books.index');
    }
}
