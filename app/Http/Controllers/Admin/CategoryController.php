<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoryController extends Controller
{
    public function index()
    {

        $category = Category::latest()->get();
        return view('admin.category.index', compact('category'));


    }

    public function update(Request $request,$id)
    {

        $category =Category::find($id);
        
        $category->cat_name = $request->up_cat_name;
        $category->cat_slug = Str::slug($request->up_cat_name);

        if ($request->hasFile('cat_image')) {
            $file = $request->file('cat_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $category->cat_image = $request->file('cat_image')->move("images/category_images", $name);
        }

        $category->save();
        return response()->json([
            'status' => 'success',
        ]);


    }


    public function store(Request $request)
    {

        $category = new Category;
        $category->cat_name = $request->cat_name;
        $category->cat_slug = Str::slug($request->cat_name);

        if ($request->hasFile('cat_image')) {
            $file = $request->file('cat_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $category->cat_image = $request->file('cat_image')->move("images/category_images", $name);
        }

        $category->save();
        return response()->json([
            'status' => 'success',
        ]);


    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');


    }


    public function inactive($id)
    {

        Category::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {

        Category::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }

}