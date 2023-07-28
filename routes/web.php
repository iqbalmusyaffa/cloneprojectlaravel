<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\SaldoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('dashboardsaldo', SaldoController::class)->name('dashboardsaldo');
Route::resource('saldo', SaldoController::class)->middleware('role:Admin');
Route::resource('pemasukan', PemasukanController::class)->middleware('role:Admin');
Route::resource('kategori', KategoriController::class)->middleware('role:Admin');
Route::resource('pengeluaran', PengeluaranController::class)->middleware('role:Admin');
// Route::middleware(['auth', 'role:admin'])->group(function () {

//     Route::resource('pemasukan', PemasukanController::class,)->middleware(['auth', 'role:admin']);
//     Route::resource('pengeluaran', PengeluaranController::class,)->middleware(['auth', 'role:admin']);
//     Route::resource('saldo', SaldoController::class,)->middleware(['auth', 'role:admin']);
//     Route::resource('kategori', KategoriController::class,)->middleware(['auth', 'role:admin']);

//     //semua route dalam grup ini hanya bisa diakses oleh operator
// });

// Route::middleware(['auth', 'role:user'])->group(function () {

//     Route::resource('pemasukan', PemasukanController::class,)->middleware(['auth', 'role:user']);
//     Route::resource('pengeluaran', PengeluaranController::class,)->middleware(['auth', 'role:user']);
//     Route::resource('saldo', SaldoController::class,)->middleware(['auth', 'role:user']);
//     Route::resource('kategori', KategoriController::class,)->middleware(['auth', 'role:user']);

//     //semua route dalam grup ini hanya bisa diakses siswa
// });

// Route::middleware(['auth', 'Admin'])->group(function () {


//     Route::resource('pemasukan', PemasukanController::class, ['except' => 'pemasukan,index']);

//     Route::resource('pengeluaran',PengeluaranController::class,['except' => 'pengeluaran,index']);
//     Route::resource('kategori',KategoriController::class,['except' => 'kategori,index']);
//     Route::resource('saldo',SaldoController::class,['except' => 'saldo,index']);
// });


// Route::middleware(['auth', 'User'])->group(function () {


//     Route::resource('pemasukan', PemasukanController::class,['except' => 'pemasukan,index']);

//     Route::resource('pengeluaran',PengeluaranController::class,['except' => 'pengeluaran,index']);
//     Route::resource('saldo',SaldoController::class,['except' => 'saldo,index']);
// });
Route::group(['middleware' => 'auth','Admin'], function() {
    Route::resource('pemasukan', PemasukanController::class, ['except' => 'pemasukan,index']);
    Route::resource('pengeluaran',PengeluaranController::class,['except' => 'pengeluaran,index']);
    Route::resource('kategori',KategoriController::class,['except' => 'kategori,index']);
    Route::resource('saldo',SaldoController::class,['except' => 'saldo,index']);
  });

  Route::group(['middleware' => 'auth','User'], function() {
    Route::resource('pemasukan', PemasukanController::class, ['except' => 'pemasukan,index']);
    Route::resource('pengeluaran',PengeluaranController::class,['except' => 'pengeluaran,index']);
    Route::resource('saldo',SaldoController::class,['except' => 'saldo,index']);
  });
