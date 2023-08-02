<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $fillabe = ['user','kategorimasuk_id','saldomasuk'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function kategorimasuk()
    {
        return $this->belongsTo(Kategorimasuk::class);
    }
    public function pemasukan(){
        return $this->hasMany(Pemasukan::class, 'kategorimasuks_id', 'id');
    }
    public function saldomasuk()
    {
        return $this->belongsTo(Saldomasuk::class, 'user_id', 'id');
    }
}
