<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorikeluar extends Model
{
    use HasFactory;
    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class);
    }
    public function saldomasuk()
    {
        return $this->belongsTo(Saldomasuk::class, 'user_id', 'id');
    }
}
