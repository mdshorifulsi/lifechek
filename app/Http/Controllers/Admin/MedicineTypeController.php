<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medicinetype;
use Str;

class MedicineTypeController extends Controller
{
    public function index()
    {

        $medicinetype = Medicinetype::latest()->get();
        return view('admin.medicinetype.index', compact('medicinetype'));


    }

    

    public function store(Request $request)
    {

        $medicinetype = new Medicinetype;
        $medicinetype->medicinetype_name = $request->medicinetype_name;
        $medicinetype->medicinetype_slug = Str::slug($request->medicinetype_name);
       

        $medicinetype->save();
        return response()->json([
            'status' => 'success',
        ]);


    }


    public function update(Request $request,$id)
    {

        $medicinetype =Medicinetype::find($id);
        
        $medicinetype->medicinetype_name = $request->up_medicinetype_name;
        $medicinetype->medicinetype_slug = Str::slug($request->up_medicinetype_name);
      
        $medicinetype->save();
        return response()->json([
            'status' => 'success',
        ]);


    }



    public function destroy($id)
    {
        $medicinetype = Medicinetype::find($id);
        $medicinetype->delete();
        return redirect()->route('medicinetype.index');


    }


    public function inactive($id)
    {

        Medicinetype::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {

        Medicinetype::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }

}
