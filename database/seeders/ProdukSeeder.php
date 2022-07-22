<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $faker = Faker::create('id_ID');

            // for ($i = 0; $i < 20; $i++) {
            //     DB::table('produks')->insert([
            //         'nama_barang' => $faker->firstNameFemale,
            //         'kategori_id' => $faker->numberBetween(1,4),
            //         'harga' => $faker->randomDigitNotNull(7),
            //         'stok' => $faker->randomDigit(),
            //         'keterangan' => $faker->text(200),
            //         'gambar' => 'default.png',
            //     ]);
            // }

            DB::table('produks')->insert([
                'nama_barang' => 'Eyeshadow',
                'kategori_id' => 4,
                'supplier_id' => 4,
                'harga' => 35000,
                'stok' => 12,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/eyeshadow1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Lipstick',
                'kategori_id' => 4,
                'supplier_id' => 4,
                'harga' => 32000,
                'stok' => 10,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/lipstick1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Foundation',
                'kategori_id' => 4,
                'supplier_id' => 4,
                'harga' => 38000,
                'stok' => 22,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/foundation1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Faceblush',
                'kategori_id' => 4,
                'supplier_id' => 4,
                'harga' => 35000,
                'stok' => 20,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/faceblush1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Eyebrow Pen',
                'kategori_id' => 4,
                'supplier_id' => 4,
                'harga' => 30000,
                'stok' => 15,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/eyebrow1.jpg',
            ]);


            //bath body

            DB::table('produks')->insert([
                'nama_barang' => 'Shower Gel',
                'kategori_id' => 3,
                'supplier_id' => 3,
                'harga' => 45000,
                'stok' => 17,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/showergel1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Body Lotion',
                'kategori_id' => 3,
                'supplier_id' => 3,
                'harga' => 30000,
                'stok' => 26,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/bodylotion1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Body Scrub',
                'kategori_id' => 3,
                'supplier_id' => 3,
                'harga' => 28000,
                'stok' => 19,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/bodyscrub1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Hand Wash',
                'kategori_id' => 3,
                'supplier_id' => 3,
                'harga' => 25000,
                'stok' => 29,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/handwash1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Hand Cream',
                'kategori_id' => 3,
                'supplier_id' => 3,
                'harga' => 25000,
                'stok' => 24,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/handcream1.jpg',
            ]);

            //hair


            DB::table('produks')->insert([
                'nama_barang' => 'Shampoo',
                'kategori_id' => 2,
                'supplier_id' => 2,
                'harga' => 35000,
                'stok' => 19,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/shampoo1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Shampoo Brush',
                'kategori_id' => 2,
                'supplier_id' => 2,
                'harga' => 35000,
                'stok' => 25,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/shampoobrush1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Root Booster Tonic',
                'kategori_id' => 2,
                'supplier_id' => 2,
                'harga' => 40000,
                'stok' => 15,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/rootboostertonic1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Hair Spray',
                'kategori_id' => 2,
                'supplier_id' => 2,
                'harga' => 30000,
                'stok' => 20,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/hairspray1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Hair Wax',
                'kategori_id' => 2,
                'supplier_id' => 2,
                'harga' => 31000,
                'stok' => 20,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/hairwax1.jpg',
            ]);

            //skincare

            DB::table('produks')->insert([
                'nama_barang' => 'Toner',
                'kategori_id' => 1,
                'supplier_id' => 1,
                'harga' => 41000,
                'stok' => 34,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/toner1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Eyeserum',
                'kategori_id' => 1,
                'supplier_id' => 1,
                'harga' => 31000,
                'stok' => 26,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/eyeserum1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Sunblock',
                'kategori_id' => 1,
                'supplier_id' => 1,
                'harga' => 26000,
                'stok' => 31,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/sunblock1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Peeling Gel',
                'kategori_id' => 1,
                'supplier_id' => 1,
                'harga' => 30000,
                'stok' => 28,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/peelinggel1.jpg',
            ]);

            DB::table('produks')->insert([
                'nama_barang' => 'Face Mask',
                'kategori_id' => 1,
                'supplier_id' => 1,
                'harga' => 35000,
                'stok' => 33,
                'masa_berlaku' => $faker->date('2023-m-d'),
                'keterangan' => $faker->text(200),
                'gambar' => 'post-image/facemask1.jpg',
            ]);
        }
}
