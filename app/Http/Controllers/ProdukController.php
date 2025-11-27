<?php

namespace App\Http\Controllers;
use App\Models\Produks;


use Illuminate\Http\Request;

class ProdukController extends Controller
{
 public function index()
    {
        // Ambil semua produk dari database
        $produk = Produks::all();

        // Kirim ke view
        return view('produk', compact('produk'));
    }

        // Menyimpan produk baru
   public function store(Request $request)
    {
    $request->validate([
        'nama' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'satuan' => 'required|string|max:50',
        'harga' => 'required|integer',
        'stok' => 'required|integer',
        'deskripsi' => 'nullable|string',
    ]);

    // Ambil kode terakhir
    $lastProduk = Produks::orderBy('id', 'desc')->first();

    if ($lastProduk) {
        // Ambil angka dari kode terakhir dan +1
        $lastNumber = (int) substr($lastProduk->kode, 3);
        $newNumber = $lastNumber + 1;
    } else {
        $newNumber = 1;
    }

    $newKode = 'PRD' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

    Produks::create([
        'kode' => $newKode,
        'nama' => $request->nama,
        'kategori' => $request->kategori,
        'satuan' => $request->satuan,
        'harga' => $request->harga,
        'stok' => $request->stok,
        'status' => $request->stok > 0 ? 'Tersedia' : 'Habis',
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }   

    public function destroy($id)
    {   
    $produk = Produks::findOrFail($id);
    $produk->delete();

    return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus!');
    }

    public function edit($id)
    {
    $produk = Produks::findOrFail($id);
    return response()->json($produk); // kita return json untuk modal
    }

    public function update(Request $request, $id)
    {
    $produk = Produks::findOrFail($id);
    $produk->update([
    'nama' => $request->nama,
    'kategori' => $request->kategori,
    'satuan' => $request->satuan,
    'harga' => $request->harga,
    'stok' => $request->stok,
    'status' => $request->stok > 0 ? 'Tersedia' : 'Habis',
    'deskripsi' => $request->deskripsi,
]);


    return redirect()->route('produk.index')->with('success', 'Produk berhasil diupdate!');
    }   

    public function show($id)
    {
    $produk = Produks::findOrFail($id);
    return response()->json($produk); // return json agar bisa diisi ke modal
    }

}
