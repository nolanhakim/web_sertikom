<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produks;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua produk dari database
        $produk = Produks::all();

        // Stats cards 
        $totalProduk = $produk->count(); //Menghitung jumlah seluruh produk
        $totalStok = $produk->sum('stok'); //Menjumlahkan semua nilai stok dari setiap produk 
        $totalKategori = $produk->unique('kategori')->count(); //Menghitung jumlah kategori unik (berbeda) dari produk.
        $totalNilai = $produk->sum(function($p){ return $p->harga * $p->stok; }); //Menghitung total nilai semua

        // Kirim semua variable ke view
        return view('dashboard', compact('produk','totalProduk','totalStok','totalKategori','totalNilai'));
    }
}
