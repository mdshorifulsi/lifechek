<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Str;

class BrandController extends Controller
{
    public function index()
    {

        $brand = Brand::latest()->get();
        return view('admin.brand.index', compact('brand'));


    }

    

    public function store(Request $request)
    {

        $brand = new Brand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name);

        if ($request->hasFile('brand_logo')) {
            $file = $request->file('brand_logo');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $brand->brand_logo = $request->file('brand_logo')->move("images/brand_images", $name);
        }

        $brand->save();
        return response()->json([
            'status' => 'success',
        ]);


    }


    public function update(Request $request,$id)
    {

        $brand =Brand::find($id);
        
        $brand->brand_name = $request->up_brand_name;
        $brand->brand_slug = Str::slug($request->up_brand_name);

        if ($request->hasFile('brand_logo')) {
            $file = $request->file('brand_logo');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $brand->brand_logo = $request->file('brand_logo')->move("images/category_images", $name);
        }

        $brand->save();
        return response()->json([
            'status' => 'success',
        ]);


    }



    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->route('brand.index');


    }


    public function inactive($id)
    {

        Brand::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {

        Brand::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }

}