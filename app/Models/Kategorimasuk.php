<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorimasuk extends Model
{
    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class);
    }
    public function kategorimasuk()
    {
        return $this->hasMany(Kategorimasuk::class)->withDefault();
    }
    public function saldokeluar()
    {
        return $this->belongsTo(Saldokeluar::class, 'user_id', 'id');
    }
}
