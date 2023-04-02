<?php

namespace App\Http\Controllers;

use App\Models\blogsku;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class users extends Controller
{
    function __construct()
    {
        $this->middleware('web');
    }
    function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
        $login = [
            'name' => $request->name,
            'password' => $request->password,
            'role' => $request->role,
        ];
        if (Auth::attempt($login)) {
            if ($request->role == 'admin') {
                session(['role' => 'admin']);
                return redirect('/admin')->with('sukses', 'sukses login sebagai admin!');
            } elseif ($request->role == 'pengguna') {
                session(['role' => 'pengguna']);
                return redirect('/pengguna')->with('sukses', 'sukses login sebagai pengguna!');
            }
        } else {
            return redirect('/')->withErrors('gagal login');
        }
    }
    function admin() {
        return view('admin.dashboardAdmin');
    }
    function pengguna() {
        $data = blogsku::all();
        $kategori = categories::all();
        return view('pengguna.dashboard', compact('data', 'kategori'));
    }
    function logout() {
        Auth::logout();
        return redirect('/');
    }
    function blog(string $id) {
        $data = blogsku::where('id', $id)->first();
        return view('pengguna.blog', compact('data'));
    }
    function kategori(string $kategori) {
        $data = blogsku::where('categorie', $kategori)->get();
        $kategori = categories::all();
        return view('pengguna.kategori', compact('data', 'kategori'));
    }
}
