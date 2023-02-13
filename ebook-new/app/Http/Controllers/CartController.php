<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function add(Request $request, $book){
        $book = Book::findOrFail($book);

        $request->validate([
            'qty' => 'required|integer|lte:'.$book->qty
        ]);

        $item = array(
            'id' => $book->id,
            'name' => $book->title,
            'quantity' => $request->qty,
            'price' => $book->price,
            'associatedModel' => $book
        );



        //Add to cart
        if(\Cart::add($item)){
        //Redirect (cart)
        return redirect()->route('shop')->with('status', 'Book was added to cart successfully.');
        }
        return redirect()->back()->with('status', 'Something want wrong');

    }



    public function increase($item){
        $book = Book::findOrFail($item);
        $cart_item = \Cart::get($item);

        if($cart_item['quantity'] < $book->qty){
            \Cart::update($item, ['quantity' => 1]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('status', 'We only have ' .$book->qty. ' ' .$book->title .  ' book in stocks');

        }
    }

     public function decrease($item){

        $cart_item = \Cart::get($item);

        if($cart_item['quantity'] <= 1){
            \Cart::remove($item);
        } else {
            \Cart::update($item, ['quantity' => -1]);
        }
        return redirect()->back();
    }


      public function checkout(Request $request){
        $request->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $data = $request->only(['fullname', 'email' , 'phone']);
        $data['user_id'] = Auth::id();
        $data['total'] = \Cart::getTotal();

        $order = Order::create($data);
        $bids = [];

        foreach(\Cart::getContent() as $item) {
            $bids[] = $item->id;


        //update stock
        $b = Book::find($item->id);
        $b->qty -= $item->quantity;
        $b->save();

        //Delete item from cart
        \Cart::remove($item->id);
        }

        // return $order->attach($bids);
        // $order->books()->attach($bids);

        //Send email to custommers


        //Redirect
        return redirect()->route('shop')->with('status', 'Order was created successfully.');

    }
}
