<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
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

    public function index()
    {
        $riwayats = Transaksi::where('author_id', auth()->user()->id)->get();
        return view('owner.index', compact('riwayats'));
    }

    public function setting()
    {
        $riwayats = Transaksi::where('author_id', auth()->user()->id)->get();
        return view('owner.setting', compact('riwayats'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('public/picture'), $filename);

            User::where('id', $user->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'nomorhp' => $request->nomorhp,
                'body' => $request->description,
                'image' => $filename,
            ]);
        }

        // Additional logic or redirection after the profile update

        return redirect()
            ->back()
            ->with('success', 'Profile updated successfully!');
    }

    public function statusupdate(Request $request, $id)
    {
        $transaksi = Transaksi::find($id)->first();

        $transaksi->update([
            'status' => $request->status,
        ]);

        // Additional logic or redirection after the profile update

        return redirect()
            ->back()
            ->with('success', 'Status updated successfully!');
    }
}
