<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kategorikeluar;
use App\Models\Kategoripemasukan;
use App\Models\Pengeluaran;
use App\Models\Saldokeluar;
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
        $pageTitle = 'halaman kategori';
        $pengeluarans = Pengeluaran::all();
        return view('pengeluaran.index', [
            'pageTitle' => $pageTitle,
            'pengeluaran' => $pengeluarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Kategori';
        $pengeluarans = Kategorikeluar::all();
        $pengeluaran = Saldokeluar::all();

        // return view('pemasukan.create', compact('pageTitle','pemasukan'));
        return view ('pengeluaran.create',[
            'pageTitle'=>$pageTitle,
            'pengeluarans'=>$pengeluarans,
            'saldomasuks'=>$pengeluaran
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
        $saldos = New Saldokeluar();
        $pengeluarans->kategorikeluar_id = $request->kategori_id;
        $pengeluarans->nominal = $request->nominal;
        $pengeluarans->deskripsi = $request->deskripsi;
        $pengeluarans->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        $pengeluarans->user_id=Auth::id();
        $saldos->user_id=Auth::id();
        $pengeluarans->save();

        $pemasukanId = $pengeluarans->id;
        $saldoKeluar = Saldokeluar::where('user_id', Auth::id())->first();

        if ($saldoKeluar) {
            $saldoKeluar->totalkeluar = $request->nominal;
        } else {
            $saldoKeluar = new Saldokeluar();
            $saldoKeluar->pengeluaran_id = $pemasukanId;
            $saldoKeluar->user_id = Auth::id();
            $saldoKeluar->totalkeluar = $request->nominal;
        }


        // $saldomasuk = Saldomasuk::where('pemasukan_id',$saldomasuk)
        // ->get; // Jumlah saldo bertambah sesuai nominal pemasukan

        $saldoKeluar->save();


        return redirect()->route('pengeluaran.index',[
        ]);
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
        $pengeluarans = Kategorikeluar::find($id);
        $pemasukan = Saldokeluar::find($id);

        return view ('pemasukan.create',[
            'pageTitle'=>$pageTitle,
            'pemasukans'=>$pengeluarans,
            'saldomasuks'=>$pemasukan
        ]);
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
            'nominal' => 'required',
            'deskripsi' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $pemasukans = Pengeluaran::find($id);
        $saldos = Saldokeluar::find($id);
        $pemasukans->kategorimasuk_id = $request->kategori_id;
        $pemasukans->nominal = $request->nominal;
        $pemasukans->deskripsi = $request->deskripsi;
        $pemasukans->tanggal_pemasukan = $request->tanggal_pemasukan;
        $pemasukans->user_id=Auth::id();
        $saldos->user_id=Auth::id();
        $pemasukans->save();

        $pemasukanId = $pemasukans->id;
        $saldomasuk = Saldokeluar::find($id);
        $saldomasuk->user_id = Auth::id();
        $saldomasuk->totalmasuk= $request->nominal;
        $saldomasuk->pemasukan_id = $pemasukanId;
        // $saldomasuk = Saldomasuk::where('pemasukan_id',$saldomasuk)
        // ->get; // Jumlah saldo bertambah sesuai nominal pemasukan

        $saldomasuk->save();


        return redirect()->route('pengeluaran.index',[
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengeluaran::find($id)->delete();

    return redirect()->route('pengeluaran.index');

    }
}
