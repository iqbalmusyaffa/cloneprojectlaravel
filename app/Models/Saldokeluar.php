<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldokeluar extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pengeluaran(){
        return $this->belongsTo(Pengeluaran::class);
    }
    public function kategorikeluar()
    {
        return $this->belongsTo(Kategori::class);
    }
}
