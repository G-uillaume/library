<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\Book;
use App\Models\User;
use App\Models\BooksInOrder;
    


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $book;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,Book $book)
    {
        // $books = Book::all();
        // $order = new Order();
        // $order->user_id = $request->user()->id;
        // // $order->user_id = 7;
        // $order->save();
    
        // $books_ids = [$request];
        // // $books_ids = 3;
        // $order->books()->attach($books_ids);
        // return "youpi";
        // return explode(',', $book); 
        // $book = explode(':', explode(',', $book)[0])[1];
        // $book = explode(',', $book);
        // return view('test2', ['book' => $book]);
        // return $book;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $orders = Order::where('user_id', $request->user()->id)->get();
        return view('orders.show', ['orders' => $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
