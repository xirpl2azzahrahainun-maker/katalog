<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'nama_produk' => 'Gesper SMA',
                'kategori_produk' => 'Atribut',
                'harga' => 45000,
                'stok' => 50,
                'deskripsi_singkat' => 'Gesper SMA Keluaran Terbaru',
                'gambar' => 'products/p1.jpg', // Path relatif dari storage/app/public
            ],
            [
                'nama_produk' => 'Penghapus Faber Castle',
                'kategori_produk' => 'Alat Tulis',
                'harga' => 3000,
                'stok' => 100,
                'deskripsi_singkat' => 'Penghapus Ukuran 6cm',
                'gambar' => 'products/p2.jpg',
            ],
            [
                'nama_produk' => 'Pensil',
                'kategori_produk' => 'Alat Tulis',
                'harga' => 2500,
                'stok' => 20,
                'deskripsi_singkat' => 'pensil kuning ',
                'gambar' => 'products/p3.jpg',
            ],

        ]);

    }
}
