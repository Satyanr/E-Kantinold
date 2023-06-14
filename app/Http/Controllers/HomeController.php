<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tambahanitem;
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

    public function profile()
    {
        $riwayats = Transaksi::where('author_id', auth()->user()->id)->get();
        return view('main.profile', compact('riwayats'));
    }

    public function userdetail($id)
    {
        $user = User::whereId($id)->first();
        return view('main.userprofile', compact('user'));
    }

    public function kantin()
    {
        $kantins = User::where('job', 'kantin')->get();
        return view('main.kantin', compact('kantins'));
    }

    public function menu()
    {
        $foods = Post::all();
        return view('main.menu', compact('foods'));
    }

    public function kantindetail($id)
    {
        $kantin = User::whereId($id)->first();
        $foods = Post::where('author_id', $id)->get();
        return view('main.kantindetail', compact('kantin', 'foods'));
    }

    public function transaksi($id)
    {
        $items = Tambahanitem::where('food_id', $id)->get();
        $foods = Post::whereId($id)->first();
        return view('main.transaksi', compact('foods', 'items'));
    }

    public function trstore(Request $request, $id)
    {
        $itemNames = $request->input('item_names');
        $selectedItemNames = [];

        // Insert the item names into the array
        foreach ($itemNames as $itemName) {
            $selectedItemNames[] = $itemName;
        }

        // Convert the array to a comma-separated string
        $itemNamesString = implode(',', $selectedItemNames);

        $transaksi = new Transaksi();
        $transaksi->name = $request->name;
        $transaksi->jumlah = $request->jumlah;
        $transaksi->total_harga = $request->totalharga;
        $transaksi->itemtambahan =  $itemNamesString;
        $transaksi->body = $request->description;
        $transaksi->author_id = auth()->user()->id;
        $transaksi->post_id = $id;
        $transaksi->kantin_id = $request->kantin_id;
        $transaksi->save();

        return redirect()->back();
    }
}
