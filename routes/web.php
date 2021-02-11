<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/neworder/{id}', function(Request $request, $id) {
    $order = new Order();
    $order->user_id = $request->user()->id;
    $order->save();
    $books_ids = $id;
    $order->books()->attach($books_ids);
    return redirect()->route('orders.show', $request->user()->id);
})->name('neworder');

Route::resource('/books', BooksController::class);
// Route::get('orders.show', [OrdersController::class, 'show'])->name('orders.show');
// Route::get('orders.neworder', [OrdersController::class, 'neworder'])->name('orders.neworder');
Route::resource('/orders', OrdersController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
