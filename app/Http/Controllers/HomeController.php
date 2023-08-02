<?php

namespace App\Http\Controllers;

use App\Models\Saldomasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = DB::table('users')
                ->where('id','=', $id)
                ->first();
        $role = $data->role;
        if ($role=="Admin"){
            $id = Auth::user()->id;
            // var_dump($id);die;
            return view('dashboard', ['data' => $data]);
        }elseif ($role=="User"){
            $saldomasuks = Saldomasuk::where('user_id',$id)->get();
            $totalpemasukan = $saldomasuks->sum('totalmasuk');
            return view('dashboard', ['data' => $data, 'saldomasuks' => $totalpemasukan]);
        }
    }
}
