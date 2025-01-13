<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */ 
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'alamat' => 'NTT',
            'role' => 'Admin',
            'jenis_kelamin' => 'L',
            'jenis_identitas' => 'KTP',
            'no_identitas' => '3203498023891235',
            'no_hp' => '089382722345',
            'foto_identitas' => null,
            'password' => Hash::make('admin123'),
        ]);
    }
}
