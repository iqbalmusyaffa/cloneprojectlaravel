<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoripengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategorikeluars')->insert([
            [
                'nama_kategori' => 'Bayar Listrik',
                'kode_kategori'=> 'BL',
                'deskripsi'=> 'Bayar Listrik',
            ],
            [
                'nama_kategori' => 'Bayar Air',
                'kode_kategori'=> 'BA',
                'deskripsi'=> 'Bayar Air',
            ],
        ]);
    }
}
