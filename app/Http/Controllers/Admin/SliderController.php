<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Str;

class SliderController extends Controller
{
    public function index()
    {

        $slider = Slider::latest()->get();
        return view('admin.slider.index', compact('slider'));


    }

    

    public function store(Request $request)
    {

        $slider = new Slider;
        $slider->slider_title = $request->slider_title;

        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $slider->slider_image = $request->file('slider_image')->move("images/slider_images", $name);
        }

        $slider->save();
        return response()->json([
            'status' => 'success',
        ]);


    }


    public function update(Request $request,$id)
    {

        $slider =Slider::find($id);
        
        $slider->slider_title = $request->up_slider_title;
        

        if ($request->hasFile('slider_image')) {
            $file = $request->file('slider_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $slider->slider_image = $request->file('slider_image')->move("images/category_images", $name);
        }

        $slider->save();
        return response()->json([
            'status' => 'success',
        ]);


    }



    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('slider.index');


    }


    public function inactive($id)
    {

        Slider::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {

        Slider::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }

}
