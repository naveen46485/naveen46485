<?php

namespace App\Http\Controllers;
use App\Models\Slider;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    public function index()
    {
        //
    }


    public function create()
    {
        $sliders= Slider::all();
        return view('admin.product.add_sliders',compact('sliders'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'image'=>'required',
            'links'=>'required'
        ]);
        $slider= new Slider;
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $slider->links= $request->links;
        $slider->title= $request->title;
        $slider->status=$request->status;
        $slider->Image=$imageName;
        $slider->save();
        return redirect()->route('sliders.create');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
