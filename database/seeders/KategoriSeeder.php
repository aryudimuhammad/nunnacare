<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Skincare',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Hair Care',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Bath & Body',
        ]);
        DB::table('kategoris')->insert([
            'nama_kategori' => 'Cosmetic',
        ]);
    }
}
