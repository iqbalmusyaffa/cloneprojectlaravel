<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemasukanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pemasukans')->insert([
            [
                'kategori_id' => 1,
                'nominal' => '100000',
                'deskripsi' => 'ini bayar kos',
                'tanggal_pemasukan' => '2023-07-27 20:36:00',
                'user_id' => 2
            ],
            [
                'kategori_id' => 2,
                'nominal' => '200000',
                'deskripsi' => 'ini bayar listirk',
                'tanggal_pemasukan' => '2023-07-27 21:36:00',
                'user_id' => 2
            ],

        ]);
    }
}
