<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Kedai Cahaya Gemilang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">

  @include('layouts.sidebar')

  <!-- Main Content -->
  <div class="md:ml-64 p-4 sm:p-6 md:p-8">

    <!-- Top Bar -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
      <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-1">Dashboard</h1>
        <p class="text-gray-500">Selamat datang kembali! 👋</p>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6 mb-8">

      <!-- Total Produk -->
      <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-5 sm:p-6 text-white shadow-xl hover:shadow-2xl transition-all hover:scale-105">
        <div class="flex justify-between items-start mb-4">
          <div class="bg-white bg-opacity-20 p-3 rounded-2xl">
            <i class="fas fa-boxes text-2xl"></i>
          </div>
        </div>
        <h3 class="text-3xl sm:text-4xl font-bold mb-2">{{ $totalProduk }}</h3>
        <p class="text-orange-100 font-medium">Total Produk</p>
      </div>

      <!-- Stok Tersedia -->
      <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-lg hover:shadow-xl transition-all hover:scale-105 border border-gray-100">
        <div class="flex justify-between items-start mb-4">
          <div class="bg-green-100 p-3 rounded-2xl">
            <i class="fas fa-warehouse text-2xl text-green-600"></i>
          </div>
        </div>
        <h3 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">{{ $totalStok }}</h3>
        <p class="text-gray-600 font-medium">Stok Tersedia</p>
      </div>

      <!-- Kategori Aktif -->
      <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-lg hover:shadow-xl transition-all hover:scale-105 border border-gray-100">
        <div class="flex justify-between items-start mb-4">
          <div class="bg-blue-100 p-3 rounded-2xl">
            <i class="fas fa-layer-group text-2xl text-blue-600"></i>
          </div>
        </div>
        <h3 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">{{ $totalKategori }}</h3>
        <p class="text-gray-600 font-medium">Kategori</p>
      </div>

      <!-- Nilai Total -->
      <div class="bg-white rounded-3xl p-5 sm:p-6 shadow-lg hover:shadow-xl transition-all hover:scale-105 border border-gray-100">
        <div class="flex justify-between items-start mb-4">
          <div class="bg-purple-100 p-3 rounded-2xl">
            <i class="fas fa-money-bill-wave text-2xl text-purple-600"></i>
          </div>
          <span class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs font-medium">IDR</span>
        </div>
        <h3 class="text-3xl sm:text-4xl font-bold text-gray-800 mb-2">
          Rp {{ number_format($totalNilai,0,',','.') }}
        </h3>
        <p class="text-gray-600 font-medium">Nilai Total</p>
      </div>

    </div>

    <!-- Daftar Produk -->
    <div class="bg-white rounded-3xl shadow-lg p-5 sm:p-6 border border-gray-100">

      <!-- Header -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6 pb-4 border-b border-gray-100">
        <div>
          <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-1">Daftar Produk</h2>
          <p class="text-gray-500 text-sm">Kelola semua produk Kedai Cahaya Gemilang</p>
        </div>
      </div>

      <!-- Table for Desktop -->
      <div class="hidden md:block overflow-x-auto">
        <table class="w-full">
          <thead>
            <tr class="text-left border-b border-gray-100">
              <th class="pb-4 px-4 text-gray-600 font-semibold text-sm">KODE</th>
              <th class="pb-4 px-4 text-gray-600 font-semibold text-sm">NAMA PRODUK</th>
              <th class="pb-4 px-4 text-gray-600 font-semibold text-sm">KATEGORI</th>
              <th class="pb-4 px-4 text-gray-600 font-semibold text-sm">HARGA</th>
              <th class="pb-4 px-4 text-gray-600 font-semibold text-sm">STOK</th>
              <th class="pb-4 px-4 text-gray-600 font-semibold text-sm">STATUS</th>
            </tr>
          </thead>
          <tbody>
            @forelse($produk as $item)
            <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
              <td class="py-4 px-6 font-medium text-gray-800">#{{ $item->kode }}</td>
              <td class="py-4 px-6">
                <div class="flex items-center gap-3">
                  <div class="w-12 h-12 bg-gradient-to-br from-orange-100 to-orange-200 rounded-xl flex items-center justify-center">
                    <i class="fas fa-box text-orange-600"></i>
                  </div>
                  <div>
                    <p class="font-semibold text-gray-800">{{ $item->nama }}</p>
                    <p class="text-xs text-gray-500">{{ $item->kategori }} • {{ $item->satuan }}</p>
                  </div>
                </div>
              </td>
              <td class="py-4 px-6">
                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium">
                  {{ $item->kategori }}
                </span>
              </td>
              <td class="py-4 px-6 font-semibold text-gray-800">
                Rp {{ number_format($item->harga, 0, ',', '.') }}
              </td>
              <td class="py-4 px-6 font-medium text-gray-800">{{ $item->stok }} {{ $item->satuan }}</td>
              <td class="py-4 px-6">
                @if($item->status == 'Tersedia')
                  <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                    <i class="fas fa-check-circle"></i> {{ $item->status }}
                  </span>
                @else
                  <span class="px-3 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                    <i class="fas fa-exclamation-circle"></i> {{ $item->status }}
                  </span>
                @endif
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="6" class="text-center py-20 text-gray-500">Belum ada produk tersedia.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      <!-- Card View for Mobile -->
      <div class="grid grid-cols-1 gap-4 md:hidden">
        @forelse($produk as $item)
        <div class="border border-gray-100 rounded-2xl p-4 shadow-sm hover:shadow-md transition-all">
          <div class="flex items-center gap-3 mb-3">
            <div class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center">
              <i class="fas fa-box text-orange-600"></i>
            </div>
            <div>
              <p class="font-semibold text-gray-800 text-sm">{{ $item->nama }}</p>
              <p class="text-xs text-gray-500">#{{ $item->kode }} • {{ $item->kategori }}</p>
            </div>
          </div>
          <p class="text-sm text-gray-600"><strong>Harga:</strong> Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
          <p class="text-sm text-gray-600"><strong>Stok:</strong> {{ $item->stok }} {{ $item->satuan }}</p>
          <div class="mt-2">
            @if($item->status == 'Tersedia')
              <span class="px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                <i class="fas fa-check-circle"></i> {{ $item->status }}
              </span>
            @else
              <span class="px-2 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                <i class="fas fa-exclamation-circle"></i> {{ $item->status }}
              </span>
            @endif
          </div>
        </div>
        @empty
        <p class="text-center py-10 text-gray-500">Belum ada produk tersedia.</p>
        @endforelse
      </div>

    </div>

    @include('layouts.footer')

  </div>

</body>
</html>
