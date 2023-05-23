<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kantins = User::where('job', 'kantin')->get();
        $foods = Post::all();
        return view('main.index', compact('kantins', 'foods'));
    }

    public function profile(){
        $riwayats = Transaksi::where('author_id', auth()->user()->id)->get();
        return view('main.profile', compact('riwayats'));
    }

    public function userdetail($id){
        $user = User::whereId($id)->first();
        return view('main.userprofile', compact('user'));
    }

    public function kantin(){
        $kantins = User::where('job', 'kantin')->get();
        return view('main.kantin', compact('kantins'));
    }

    public function kantindetail($id)
    {
        $kantin = User::whereId($id)->first();
        $foods = Post::where('author_id', $id)->get();
        return view('main.kantindetail', compact('kantin', 'foods'));
    }

    public function transaksi($id){
        $foods = Post::whereId($id)->first();
        return view('main.transaksi', compact('foods'));
    }

    public function trstore(Request $request, $id){


        Transaksi::create([
            'name'=>$request->name,
            'jumlah'=>$request->jumlah,
            'total_harga'=>$request->totalharga,
            'body'=>$request->description,
            'author_id'=>auth()->user()->id,
            'post_id'=>$id,
            'kantin_id'=>$request->kantin_id,
        ]);

        return redirect()->back();
    }
}
