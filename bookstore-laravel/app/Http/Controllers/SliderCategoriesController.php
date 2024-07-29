<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderCategoriesController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderCategories = Slider::all();

        return view('dashboard.sliderCategories.index', [
            'sliderCategories' => $sliderCategories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sliderCategories.create');

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
            return redirect()->route('sliderCategories.index')->with('status', 'Slide was created successfully.');
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
    $sliderCategories = Slider::findOrFail($id);

        return view('dashboard.sliderCategories.edit', [
            'sliderCategories' => $sliderCategories
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

        $sliderCategories = Slider::findOrFail($id);

        $sliderCategories->name = $request->name;

        if($sliderCategories->save()) {
            return redirect()->route('sliderCategories.index')->with('status', 'Slide was updated successfully.');
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
        $sliderCategories = Slider::findOrFail($id);

        if($sliderCategories->delete()){
             return redirect()->route('sliderCategories.index')->with('status', 'Slide was deleted successfully.');
        }

        return redirect()->back()->with('status', 'Something want wrong!');
        }
}
