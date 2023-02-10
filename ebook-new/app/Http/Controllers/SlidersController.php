<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlidersController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        $books = book::all();

        return view('dashboard.sliders.index', [
            'sliders' => $sliders,
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
        return view('dashboard.sliders.create');
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
            'name' => 'string',
        ]);

        $data = $request->only(['name']);

        if(Slider::create($data)) {
            return redirect()->route('sliders.index')->with('status', 'Slide was created successfully.');
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
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    $slider = Slider::findOrFail($id);

        return view('dashboard.sliders.edit', [
            'slider' => $slider
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
              'name' => 'string',
        ]);

        $data = $request->only(['name']);

        $slider = Slider::findOrFail($id);

        $slider->name = $request->name;

        if($slider->save()) {
            return redirect()->route('sliders.index')->with('status', 'Slide was updated successfully.');
        }

        return redirect()->back()->with('status', 'Something want wrong!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
         if($slider->delete()){
                 return redirect()->route('sliders.index')->with('status', 'Slide was deleted successfully.');
         }
                 // $deleteSliderCategory = $this->deleteSliderCategory($slider);
    // $deleteSlider = $this->deleteSlider($request, $slider->id);

    // if ($deleteSlider) {
    // } elseif ( $deleteSliderCategory) {
    //     return redirect()->route('sliderCategories.index')->with('status', 'Slide was deleted successfully.');
    // }
    //     return redirect()->back()->with('status', 'Something want wrong!');

    }


            /**
     * Remove the specified resource from storage.
     *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function deleteSliderCategory(Slider $slider)
    //     {
    //     if($slider->delete()){
    // return true;
    // }

    // return false;
    //     }


               /**
     * Remove the specified resource from storage.
     *
   * @param  Request $request
 * @param  int  $id
 * @return \Illuminate\Http\RedirectResponse
 */
public function deleteSlider(Request $request, $id)
{

    $request->validate([
        'slider_category_id' => '',
    ]);

    $data = $request->only(['slider_category_id']);

    $slider = Book::findOrFail($id);
    $slider->slider_category_id = $request->slider_category_id;

    if ($slider->save()) {
      return redirect()->route('sliders.index')->with('status', 'Slide was deleted successfully.');
    }
            return redirect()->back()->with('status', 'Something want wrong!');

}
}


