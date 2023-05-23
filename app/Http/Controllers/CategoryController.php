<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['role:admin']);
    }


    public function store(Request $request){
        Category::create([
            'name'=>$request->name,
            'slug'=> Str::slug($request->name),
        ]);

        return redirect()->back();
    }

    public function edit($id){
       $categories = Category::whereId($id)->first();

       return view ('admin.editcategory', compact('categories'));
    }

    public function update (Request $request, $id){
        $category = Category::find($id);
        $category->update([
            'name'=>$request->name,
            'slug'=> Str::slug($request->name),
        ]);

        return redirect()->back();
    }

    public function destroy ($id){
        $category = Category::find($id);
        $category ->delete();        

        return redirect()->back();
    }
}
