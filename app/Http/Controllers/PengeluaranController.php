<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengeluaran;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'halaman pengeluaran';
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', [
            'pageTitle' => $pageTitle,
            'pengeluaran' => $pengeluaran
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create pengeluaran';
        $pengeluarans = Kategori::all();

        // return view('pemasukan.create', compact('pageTitle','pemasukan'));
        return view ('pengeluaran.create',[
            'pageTitle'=>$pageTitle,
            'pengeluaran'=>$pengeluarans
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
        $pengeluarans = New Pengeluaran();
        $pengeluarans->kategori_id = $request->kategori_id;
        $pengeluarans->nominal = $request->nominal;
        $pengeluarans->deskripsi = $request->deskripsi;
        $pengeluarans->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        $pengeluarans->user_id=Auth::id();
        $pengeluarans->save();

        return redirect()->route('pengeluaran.index');
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
