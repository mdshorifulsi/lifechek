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
use DB;
class StockController extends Controller
{
    public function index()
{
        $product = Product::latest()->get();
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        $medicinetype = Medicinetype::latest()->get();
        return view('admin.stock.index', compact('product','category','brand','medicinetype'));

}


public function update(Request $request,$id){

        $data=array();
        $data['stock_quantity']=$request->up_stock_quantity;
        DB::table('products')->where('id',$id)->update($data);
        
        return response()->json([
            'status' => 'success',
        ]);

    }


}
