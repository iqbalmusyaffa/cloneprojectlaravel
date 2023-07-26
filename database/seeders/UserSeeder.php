<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Adminname',
                'email'=> 'admin@gmail',
                'password'=>bcrypt('adminlogin'),
                'role'=>'Admin'
            ],
            [
                'name' => 'Userclient',
                'email'=> 'user@gmail',
                'password'=>bcrypt('userkeren'),
                'role'=>'User'
            ],
        ]);
    }
}
