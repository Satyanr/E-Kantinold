<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
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


    public function index()
    {
        return view('admin.index');
    }

    public function category()
    {
        $categories = Category::all();

        return view('admin.category', compact('categories'));
    }

    public function ruangan()
    {
        $ruangans = Ruangan::all();

        return view('admin.ruangan', compact('ruangans'));
    }
}
