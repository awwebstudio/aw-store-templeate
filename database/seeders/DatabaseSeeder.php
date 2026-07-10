<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Antonius',
            'email' => 'antoniusgratziaamawitak@gmail.com',
            'password' => bcrypt('Gr33tyw1t4k'),
            'role' => 'admin',
        ]);

        Product::create([
            'nama_produk' => 'Yamaha F310',
            'harga' => 2500000,
            'stok' => 10,
            'deskripsi' => 'Gitar akustik Yamaha berkualitas.',
            'gambar' => 'yamaha.jpeg',
        ]);

        Product::create([
            'nama_produk' => 'Fender Electric Guitar',
            'harga' => 3000000,
            'stok' => 7,
            'deskripsi' => 'Gitar elektrik Fender.',
            'gambar' => 'fender.jpeg',
        ]);

        Product::create([
            'nama_produk' => 'Gibson Les Paul',
            'harga' => 7500000,
            'stok' => 5,
            'deskripsi' => 'Gitar Gibson Les Paul.',
            'gambar' => 'gibson.jpeg',
        ]);

        Product::create([
            'nama_produk' => 'Ibanez Bass',
            'harga' => 3700000,
            'stok' => 8,
            'deskripsi' => 'Bass Ibanez untuk pemain profesional.',
            'gambar' => 'ibanez.jpeg',
        ]);

        Product::create([
            'nama_produk' => 'Taylor Guitars',
            'harga' => 4800000,
            'stok' => 6,
            'deskripsi' => 'Gitar akustik Taylor.',
            'gambar' => 'taylor.jpeg',
        ]);
    }
}