<?php

namespace App\Http\Controllers;

use App\Models\Kategorikeluar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class KategoripengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'halaman kategori';
        $kategoripengeluaran = Kategorikeluar::all();
        return view('kategoripengeluaran.index', [
            'pageTitle' => $pageTitle,
            'kategoripengeluaran' => $kategoripengeluaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Kategori';
        $kategoripengeluaran = Kategorikeluar::all();

        return view('kategoripengeluaran.create', compact('pageTitle','kategoripengeluaran'));
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
        $kategoripengeluaran = New Kategorikeluar;
        $kategoripengeluaran->nama_kategori = $request->namakategori;
        $kategoripengeluaran->kode_kategori = $request->kodekategori;
        $kategoripengeluaran->deskripsi = $request->deskripsi;
        $kategoripengeluaran->save();

        return redirect()->route('kategoripengeluaran.index');
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
        $kategorikeluars = Kategorikeluar::find($id);

        return view('kategoripengeluaran.edit', compact('pageTitle','kategorikeluars'));
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
        $kategorikeluars =Kategorikeluar::find($id);
        $kategorikeluars->nama_kategori = $request->namakategori;
        $kategorikeluars->kode_kategori = $request->kodekategori;
        $kategorikeluars->deskripsi = $request->deskripsi;
        $kategorikeluars->save();

        return redirect()->route('kategoripengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategorikeluar::find($id)->delete();

        return redirect()->route('kategoripengeluaran.index');
    }
}
