<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldomasuk extends Model
{
    use HasFactory;
    protected $fillabe = ['user','pemasukan'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function pemasukan(){
        return $this->belongsTo(Pemasukan::class);
    }
    public function kategorimasuk()
    {
        return $this->belongsTo(Kategorimasuk::class);
    }
}
