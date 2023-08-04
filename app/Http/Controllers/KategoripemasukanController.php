<?php

namespace App\Http\Controllers;

use App\Models\Kategorimasuk;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategoripemasukan;
use Illuminate\Http\Request;

class KategoripemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $pageTitle = 'halaman kategori';
        $kategoripemasukan = Kategorimasuk::all();
        return view('kategoripemasukan.index', [
            'pageTitle' => $pageTitle,
            'kategoripemasukan' => $kategoripemasukan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Kategori';
        $kategoripemasukan = Kategorimasuk::all();

        return view('kategoripemasukan.create', compact('pageTitle','kategoripemasukan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'namakategori' => 'required',
            'kodekategori' => 'required',
            'deskripsi' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $kategoripemasukan = New Kategorimasuk;
        $kategoripemasukan->nama_kategori = $request->namakategori;
        $kategoripemasukan->kode_kategori = $request->kodekategori;
        $kategoripemasukan->deskripsi = $request->deskripsi;
        $kategoripemasukan->save();

        return redirect()->route('kategoripemasukan.index');
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
        $pageTitle = 'Create Kategori';
        $kategorimasuks = Kategorimasuk::find($id);

        return view('kategoripemasukan.edit', compact('pageTitle','kategorimasuks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'namakategori' => 'required',
            'kodekategori' => 'required',
            'deskripsi' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $kategorimasuks =Kategorimasuk::find($id);
        $kategorimasuks->nama_kategori = $request->namakategori;
        $kategorimasuks->kode_kategori = $request->kodekategori;
        $kategorimasuks->deskripsi = $request->deskripsi;
        $kategorimasuks->save();

        return redirect()->route('kategoripemasukan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategorimasuk::find($id)->delete();

        return redirect()->route('kategoripemasukan.index');
    }
}
