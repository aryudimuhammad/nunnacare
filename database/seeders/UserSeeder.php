<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'telepon' => '08387126333',
            'alamat' => 'Jln.Ketapi',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123'),
            'role' => 1,
        ]);
        DB::table('users')->insert([
            'name' => 'ada',
            'telepon' => '08387126322',
            'alamat' => 'Jln.Ketapi2',
            'email' => 'ada@gmail.com',
            'role' => 2,
            'password' => Hash::make('123'),
        ]);
    }
}
