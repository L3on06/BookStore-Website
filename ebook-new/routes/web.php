<?php

use App\Models\Book;
use App\Models\Order;
use App\Models\Slider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SlidersController;

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

$books= Book::all();

    return view('home', [
        'books' => $books
    ]);
})->name('home');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');


Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');


Route::resource('sliders', SlidersController::class);
Route::resource('books', BooksController::class);
Route::resource('orders', OrdersController::class)->only(['index', 'destroy']);





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', [
            'sliders' => Slider::count(),
            'books' => Book::count(),
            'orders' => Order::count(),


        ]);
    })->name('dashboard');
});
