<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['role:kantin']);
    }


    public function index()
    {   $posts = Post::where('author_id', auth()->user()->id)->get(); 
        $categories = Category::all();
        $riwayats = Transaksi::where('author_id', auth()->user()->id)->get();

        return view('owner.food', compact('posts','categories','riwayats'));
    }

    public function status(Request $request){
        $post = new Post();
        $post-> status = $request->has('status');
        $post->save();

        return redirect()->back();
    }

    public function store(Request $request){
        
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
        }
        
    

        Post::create([
            'title'=>$request->name,
            'slug'=> Str::slug($request->name),
            'category_id'=>$request->category,
            'author_id'=>auth()->user()->id,
            'price'=>$request->price,
            'body'=>$request->description,
            'image'=>$filename,    
        ]);

        return redirect()->back()->with('success', 'Post created successfully!');
    }
}
