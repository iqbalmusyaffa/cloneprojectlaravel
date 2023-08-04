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
use PDF;

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
        $pengeluaran = Pengeluaran::find($id);
        $kategorikeluar = Kategorikeluar::all();
        $pengeluarans = Saldokeluar::find($id);

        return view('pengeluaran.edit', compact('pageTitle','pengeluaran','kategorikeluar','pengeluarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // var_dump($request->kategori_id);die();
         $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
            'regex' => 'Isi :attribute dengan huruf besar saja',
        ];

        $validator = Validator::make($request->all(), [
             'kategori_id' =>'required',
            'nominal' => 'required',
            'deskripsi' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

           // Dapatkan Data Pemasukan dan Saldo Masuk yang akan diupdate
    $pengeluaran = Pengeluaran::find($id);
    $saldokeluar = Saldokeluar::where('pengeluaran_id', $id)->first();


    // Update Data Pemasukan
    $pengeluaran->kategorikeluar_id = $request->kategori_id;
    $pengeluaran->nominal = $request->nominal;
    $pengeluaran->deskripsi = $request->deskripsi;
    $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
    $pengeluaran->user_id = Auth::id();
    $pengeluaran->save();

    // Update Data Saldo Masuk
    $saldokeluar->user_id = Auth::id();
    $saldokeluar->totalkeluar = $request->nominal;
    $saldokeluar->save();

        return redirect()->route('pengeluaran.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengeluaran::find($id)->delete();

    return redirect()->route('pengeluaran.index');

    }

    public function exportPdf2()
    {
        $pengeluaran = Pengeluaran::all();

        $pdf = PDF::loadView('pengeluaran.export_pdf', compact('pengeluaran'));

        return $pdf->download('pengeluaran.pdf');
    }

}
