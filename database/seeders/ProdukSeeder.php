<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        Produk::insert([
            [
                'kode' => 'PRD001',
                'nama' => 'Smartphone XYZ',
                'kategori' => 'Elektronik',
                'satuan' => 'Unit',
                'harga' => 3500000,
                'stok' => 25,
                'status' => 'Tersedia',
                'deskripsi' => 'Smartphone dengan performa tinggi dan layar jernih.'
            ],
            [
                'kode' => 'PRD002',
                'nama' => 'Kaos Premium',
                'kategori' => 'Fashion',
                'satuan' => 'Pcs',
                'harga' => 150000,
                'stok' => 50,
                'status' => 'Tersedia',
                'deskripsi' => 'Kaos berbahan premium, nyaman dipakai.'
            ],
            [
                'kode' => 'PRD003',
                'nama' => 'Snack Keripik',
                'kategori' => 'Makanan',
                'satuan' => 'Pack',
                'harga' => 25000,
                'stok' => 0,
                'status' => 'Habis',
                'deskripsi' => 'Camilan renyah dengan berbagai rasa.'
            ],
        ]);
    }
}
