<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Medicinetype;
use App\Models\Admin;
use Str;

class ProductControler extends Controller
{
     public function index()
    {

        $product = Product::latest()->get();
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        $medicinetype = Medicinetype::latest()->get();
        return view('admin.product.index', compact('product','category','brand','medicinetype'));


    }


     public function store(Request $request)
    {

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->generic_name = $request->generic_name;
        $product->category_id  = $request->category_id ;
        $product->medicinetype_id = $request->medicinetype_id;
        $product->brand_id = $request->brand_id;
        $product->power = $request->power;
        $product->purchase_price = $request->purchase_price;
        $product->mrp = $request->mrp;
        $product->discount = $request->discount;
        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->description;
        
        $product->admin_id=\Auth::guard('admin')->user()->id;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $product->product_image = $request->file('product_image')->move("images/product_images", $name);
        }

        $product->save();
        return response()->json([
            'status' => 'success',
        ]);


    }


    public function update(Request $request,$id)
    {

        $product =Product::find($id);
        
        $product->product_name = $request->up_product_name;
        $product->product_slug = Str::slug($request->up_product_name);
        $product->generic_name = $request->up_generic_name;
        $product->power = $request->up_power;
        $product->purchase_price = $request->up_purchase_price;
        $product->mrp = $request->up_mrp;
        $product->discount = $request->up_discount;
        $product->stock_quantity = $request->up_stock_quantity;
        $product->description = $request->up_description;
        $product->category_id  = $request->up_category_id ;
        $product->medicinetype_id = $request->up_medicinetype_id;
        $product->brand_id = $request->up_brand_id;
        $product->admin_id=\Auth::guard('admin')->user()->id;

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $product->product_image = $request->file('product_image')->move("images/product_images", $name);
        }

        $product->save();
        return response()->json([
            'status' => 'success',
        ]);


    }



    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index');


    }


    public function inactive($id)
    {

        Product::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {

        Product::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }

}
