<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['role:admin']);
    }


    public function store(Request $request){
        Ruangan::create([
            'name'=>$request->name,
            'nomor'=>$request->nomor,
        ]);

        return redirect()->back();
    }

    public function edit($id){
       $ruangans = Ruangan::whereId($id)->first();

       return view ('admin.editruangan', compact('ruangans'));
    }

    public function update (Request $request, $id){
        $ruangans = Ruangan::find($id);
        $ruangans->update([
            'name'=>$request->name,
            'nomor'=>$request->nomor,
        ]);

        return redirect()->back();
    }

    public function destroy ($id){
        $ruangans = Ruangan::find($id);
        $ruangans ->delete();        

        return redirect()->back();
    }
}
