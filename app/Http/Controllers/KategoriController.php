<?php

namespace App\Http\Controllers;

use App\kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //halaman awal
        $kategoris = kategori::all();
        return view('prioritas.index',['kategoris'=>$kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //form buat input data
        return view('complaints.ad-new-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nama' => 'required',
            'prioritas' =>'required',
        ]);
        $kategori = new kategori();
        $kategori->nama = $request->nama;
        $kategori->prioritas = $request->prioritas;
        $kategori->save();
        return redirect()->route('createkategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $kategori = kategori::find($id);
        return route('showKategori',['kategori'=>$kategori]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
//    public function edit(kategori $kategori)
    public function edit()
    {
        //
        $kategoris = kategori::all();
//        return $kategoris;
        return view('complaints.ad-edit-category',['kategoris'=>$kategoris]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'nama' => 'required',
            'prioritas' =>'required',
        ]);
        $kategori = kategori::find($id);
        $kategori->nama = $request->nama;
        $kategori->prioritas= $request->prioritas;
        $kategori->save();
//        return $kategori;
        return redirect()->route('editkategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kategori = kategori::find($id);
        $kategori->delete();
        return redirect()->route('editkategori');
    }
}
