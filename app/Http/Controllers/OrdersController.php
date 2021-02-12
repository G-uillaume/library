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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->role == 'user') {
            $books = Book::all()->sortBy('title');
            return view('orders.create', ['books' => $books]);
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
    public function store(Request $request)
    {
        if ($request->user()->role == 'user') {
            $order = new Order;
            $order->user_id = $request->user()->id;
            $order->save();
            $order->books()->attach($request->books);
            return redirect()->route('orders.show', $request->user()->id);
        } else {
            return view('notAdmin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        if ($request->user()->role == 'user') {
            $orders = Order::where('user_id', $request->user()->id)->get();
        } else {
            $orders = Order::all();
        }
        return view('orders.show', ['orders' => $orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if ($request->user()->role == 'user') {
            $books = Book::all()->sortBy('title');
            $order = Order::find($id);
            return view('orders.edit', ['order' => $order, 'books' => $books]);
        } else {
            return view('notAdmin');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->books()->sync($request->books);
        return redirect()->route('orders.show', $request->user()->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)
    {
        
        $order->delete($order);
        return redirect()->route('orders.show', $request->user()->id);
        // return $order;
    }
}
