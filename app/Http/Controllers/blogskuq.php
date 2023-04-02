<?php

namespace App\Http\Controllers;

use App\Models\blogsku;
use App\Models\categories;
use App\Models\komentar;
use Illuminate\Http\Request;

class blogskuq extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = blogsku::paginate(10);
        $categorie = categories::all();
        return view('admin.dashboardAdmin', compact('data', 'categorie'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'required',
            'sinopsis' => 'required',
            'body' => 'required',
            'categorie' => 'required',
        ]);
        $store = [
            'title' => $request->title,
            'picture' => $request->picture,
            'sinopsis' => $request->sinopsis,
            'body' => $request->body,
            'categorie' => $request->categorie,
        ];
        blogsku::create($store);
        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = blogsku::where('id', $id)->first();
        $categorie = categories::all();
        return view('admin.updateBlog', compact('data', 'categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'picture' => 'required',
            'sinopsis' => 'required',
            'body' => 'required',
            'categorie' => 'required',
        ]);
        $update = [
            'title' => $request->title,
            'picture' => $request->picture,
            'sinopsis' => $request->sinopsis,
            'body' => $request->body,
            'categorie' => $request->categorie,
        ];
        blogsku::where('id', $id)->update($update);
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        blogsku::where('id', $id)->delete();
        return redirect('/admin');
    }
}
