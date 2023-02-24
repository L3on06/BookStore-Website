<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();

        return view('dashboard.books.index', [

        'books' => $books,
       ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|decimal:2',
        ]);

        $data = $request->only(['title', 'description', 'qty', 'price']);
        $data['user_id'] = Auth::id();

        if($request->hasfile('image')) {
            // rename
            $file = $request['image']->getClientOriginalName();
            $name = pathinfo($file, PATHINFO_FILENAME);
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $image = time().'-'.$name.'.'.$ext;
            Storage::putFileAs('public/books/', $request['image'], $image);
            $data['image'] = $image;
        }

        if(Book::create($data)) {
            return redirect()->route('books.index')->with('status', 'Book was created successfully.');
        }
            return redirect()->back()->with('status', 'Something want wrong!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

       return view('viewBook', [
            'book' => $book
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $sliders = Slider::all();

       return view('dashboard.books.edit', [
            'sliders' => $sliders,
            'book' => $book
       ]);
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
        $request->validate([
            'slider_category_id' => '',
            'title' => 'required|string',
            'description' => 'required',
            'qty' => 'required|integer',
            'price' => 'required',
        ]);

        $data = $request->only(['slider_category_id' ,'title', 'description', 'qty', 'price']);

        $book = Book::findOrFail($id);


        if($request->hasfile('image')) {


            //Delete old images
            $oldImages = 'public/books/'.$book->image;
            if(Storage::exists($oldImages)){
                Storage::delete($oldImages);
            }

            // rename
            $file = $request['image']->getClientOriginalName();
            $name = pathinfo($file, PATHINFO_FILENAME);
            $ext = pathinfo($file, PATHINFO_EXTENSION);
            $image = time().'-'.$name.'.'.$ext;
            Storage::delete($book->image);
            Storage::putFileAs('public/books/', $request['image'], $image);
            $book->image = $image;
        }

        $book->slider_category_id = $request->slider_category_id;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->qty = $request->qty;
        $book->price = $request->price;

        if($book->update()) {
            return redirect()->route('books.index')->with('status', 'Slide was updated successfully.');
        }
        return redirect()->back()->with('status', 'Something want wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);

            $oldImages = 'public/books/'.$book->image;
            if(Storage::exists($oldImages))
            {
                Storage::delete($oldImages);
            }

        if($book->delete()){
            return redirect()->route('books.index')->with('status', 'Slide was deleted successfully.');
        }
            return redirect()->back()->with('status', 'Something want wrong!');
        }
    }
