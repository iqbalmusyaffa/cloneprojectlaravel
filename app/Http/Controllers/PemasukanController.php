<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kategorimasuk;
use App\Models\Kategoripemasukan;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Saldomasuk;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;




class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'halaman kategori';
        $pemasukans = Pemasukan::all();
        return view('pemasukan.index', [
            'pageTitle' => $pageTitle,
            'pemasukans' => $pemasukans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Kategori';
        $pemasukans = Kategorimasuk::all();
        $pemasukan = Saldomasuk::all();

        // return view('pemasukan.create', compact('pageTitle','pemasukan'));
        return view ('pemasukan.create',[
            'pageTitle'=>$pageTitle,
            'pemasukans'=>$pemasukans,
            'saldomasuks'=>$pemasukan
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
        $saldos = New Saldomasuk();
        $pemasukans->kategorimasuk_id = $request->kategori_id;
        $pemasukans->nominal = $request->nominal;
        $pemasukans->deskripsi = $request->deskripsi;
        $pemasukans->tanggal_pemasukan = $request->tanggal_pemasukan;
        $pemasukans->user_id=Auth::id();
        $saldos->user_id=Auth::id();
        $pemasukans->save();

        $pemasukanId = $pemasukans->id;
        $saldomasuk = new Saldomasuk();
        $saldomasuk->user_id = Auth::id();
        $saldomasuk->totalmasuk= $request->nominal;
        $saldomasuk->pemasukan_id = $pemasukanId;
        // $saldomasuk = Saldomasuk::where('pemasukan_id',$saldomasuk)
        // ->get; // Jumlah saldo bertambah sesuai nominal pemasukan

        $saldomasuk->save();


        return redirect()->route('pemasukan.index',[
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'Create Kategori';
        $pemasukan= Pemasukan::find($id);

        return view('pemasukan.index', compact('pageTitle','pemasukan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'Create Kategori';
        $pemasukan = Pemasukan::find($id);
        $kategorimasuk = Kategorimasuk::all();
        $pemasukans = Saldomasuk::find($id);

        return view('pemasukan.edit', compact('pageTitle','pemasukan','kategorimasuk','pemasukans'));
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
    $pemasukan = Pemasukan::find($id);
    $saldomasuk = Saldomasuk::where('pemasukan_id', $id)->first();


    // Update Data Pemasukan
    $pemasukan->kategorimasuk_id = $request->kategori_id;
    $pemasukan->nominal = $request->nominal;
    $pemasukan->deskripsi = $request->deskripsi;
    $pemasukan->tanggal_pemasukan = $request->tanggal_pemasukan;
    $pemasukan->user_id = Auth::id();
    $pemasukan->save();

    // Update Data Saldo Masuk
    $saldomasuk->user_id = Auth::id();
    $saldomasuk->totalmasuk = $request->nominal;
    $saldomasuk->save();

        return redirect()->route('pemasukan.index')->with('success', 'Data updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemasukan = Pemasukan::find($id);

        if ($pemasukan) {
            // Update 'pemasukan_id' to null in associated Saldomasuk records
            Saldomasuk::where('pemasukan_id', $pemasukan->id)->update(['pemasukan_id' => $id]);

            // Then delete the Pemasukan record
            $pemasukan->delete();
        }

        return redirect()->route('pemasukan.index');

    }

    public function exportPdf1()
    {
        $pemasukan = Pemasukan::all();

        $pdf = PDF::loadView('pemasukan.export_pdf', compact('pemasukan'));

        return $pdf->download('pemasukan.pdf');
    }

}
