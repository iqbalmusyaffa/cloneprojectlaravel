<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pemasukan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'halaman kategori';
        $pemasukan = Pemasukan::all();
        return view('pemasukan.index', [
            'pageTitle' => $pageTitle,
            'pemasukan' => $pemasukan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Kategori';
        $pemasukans = Kategori::all();

        // return view('pemasukan.create', compact('pageTitle','pemasukan'));
        return view ('pemasukan.create',[
            'pageTitle'=>$pageTitle,
            'pemasukans'=>$pemasukans
        ]);
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
            'nominal' => 'required',
            'deskripsi' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $pemasukans = New Pemasukan();
        $pemasukans->kategori_id = $request->kategori_id;
        $pemasukans->nominal = $request->nominal;
        $pemasukans->deskripsi = $request->deskripsi;
        $pemasukans->tanggal_pemasukan = $request->tanggal_pemasukan;
        $pemasukans->user_id=Auth::id();
        $pemasukans->save();

        return redirect()->route('pemasukan.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
