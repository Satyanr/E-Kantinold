<?php

namespace App\Http\Controllers;

use App\Models\Tambahanitem;
use Illuminate\Http\Request;

class TambahanitemController extends Controller
{
    public function store(Request $request){
        

        Tambahanitem::create([
            'name'=>$request->name,
            'harga'=>$request->harga,
            'food_id'=>$request->food_id,   
        ]);

        return redirect()->back()->with('success', 'Post created successfully!');
    }

    public function destroy ($id){
        $item = Tambahanitem::find($id);
        $item ->delete();        

        return redirect()->back();
    }
}
