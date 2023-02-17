<?php

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\SliderCategoriesController;

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
$books = Book::all();
$sliders = Slider::all();

    return view('home', [
        'books' => $books,
        'sliders' => $sliders,
    ]);
})->name('home');

Route::get('/shop', function (Request $request) {
$books = Book::paginate(12);

if(isset($request->search) && strlen($request->search) > 1){
    $books = Book::where('title', 'LIKE', '%'.$request->search.'%')->paginate(12);
}


if(isset($request->sort) && !empty($request->sort)){
    $sort_parts = explode('_', $request->sort);
    $column = $sort_parts[0];
    $value = $sort_parts[1];

    if($column === 'title'){
        $books = Book::orderBy('title', $value)->paginate(12);
    } elseif($column === 'price'){
        $books = Book::orderBy('price', $value)->paginate(12);
    }
}

    return view('shop', [
        'books' => $books
    ]);
})->name('shop');


Route::get('/cart', function () {
 return view('cart');})->name('cart');

Route::get('/checkout', function () {
    return view('checkout');})->name('checkout');

Route::resource('sliderCategories', SliderCategoriesController::class)->middleware('role:admin');
Route::resource('sliders', SlidersController::class)->middleware('role:admin');
Route::resource('books', BooksController::class);
Route::resource('orders', OrdersController::class)->only(['index', 'destroy']);

//Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{book}/add', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/{item}/increase', [CartController::class, 'increase'])->name('cart.increase');
Route::get('/cart/{item}/decrease', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        if(!Auth::user()->hasRole('admin')){
            $orders = Order::where('user_id', Auth::id())->count();
        } else {
            $orders = Order::count();
        }

        return view('dashboard', [
            'sliderCategories' => Slider::count(),
            'books' => Book::count(),
            'slider' => book::count('slider_category_id'),
            'orders' => $orders,
        ]);
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/user', function () {
        $users = User::where('id', Auth::id())->get();

        return view('user', [
            'users' => $users,
        ]);
    })->name('user');
});
