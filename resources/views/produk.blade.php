<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Kedai Cahaya Gemilang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Responsive sidebar handling */
        @media (max-width: 768px) {
            .sidebar-offset {
                margin-left: 0 !important;
            }
        }
        
        /* Smooth scrolling for tables */
        .table-scroll {
            -webkit-overflow-scrolling: touch;
        }

        /* Modal animations */
        .modal-backdrop {
            backdrop-filter: blur(4px);
            animation: fadeIn 0.2s ease-out;
        }
        
        .modal-content {
            animation: slideUp 0.3s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #F97316;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #EA580C;
        }

        /* Input focus effect */
        .input-field:focus {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.15);
        }
    </style>
</head>
<body class="bg-gray-50">
    
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="sidebar-offset ml-0 md:ml-64 p-4 md:p-8">
        
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 md:mb-8 gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">Manajemen Produk</h1>
                <p class="text-sm md:text-base text-gray-500">Kelola semua produk Kedai Cahaya Gemilang 📦</p>
            </div>
        </div>

        <!-- Action Bar & Filters -->
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg p-4 md:p-6 mb-4 md:mb-6 border border-gray-100">
            <div class="flex flex-col gap-3 md:gap-4">
                
                <!-- Search & Filter -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full">
                    <div class="relative w-full sm:flex-1 sm:max-w-xs">
                        <input type="text" id="searchInput" placeholder="Cari produk..." 
                               class="w-full pl-10 pr-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                        <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                    </div>
                    
                    <select class="px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all w-full sm:w-auto text-sm">
                        <option>Semua Kategori</option>
                        <option>Elektronik</option>
                        <option>Fashion</option>
                        <option>Makanan</option>
                        <option>Minuman</option>
                    </select>
                </div>

                <!-- Add Button -->
                <div class="flex items-center gap-3 w-full">
                    <button onclick="showAddModal()" 
                            class="flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-lg font-medium shadow-md hover:shadow-lg transition-all hover:scale-105 w-full sm:w-auto text-sm">
                        <i class="fas fa-plus text-xs"></i>
                        <span>Tambah Produk</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Products Table - Desktop View -->
        <div class="hidden md:block bg-white rounded-3xl shadow-lg border border-gray-100">
            <div class="overflow-x-auto table-scroll">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">KODE</th>
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">PRODUK</th>
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">KATEGORI</th>
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">HARGA</th>
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">STOK</th>
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">STATUS</th>
                            <th class="text-center py-4 px-6 text-gray-600 font-semibold text-sm">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        @foreach($produk as $item)
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6">
                                <span class="text-gray-800 font-medium">#{{ $item->kode }}</span>
                            </td>
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
                            <td class="py-4 px-6">
                                <span class="text-gray-800 font-semibold">
                                    Rp {{ number_format($item->harga, 0, ',', '.') }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-800 font-medium">{{ $item->stok }} {{ $item->satuan }}</span>
                            </td>
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
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="viewProduct('{{ $item->id }}')" 
                                            class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all" 
                                            title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editProduct({{ $item->id }})" 
                                            class="p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all" 
                                            title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="deleteProduct('{{ $item->id }}')" 
                                            class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-all" 
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Products Cards - Mobile View -->
        <div class="md:hidden space-y-3" id="productCardBody">
            @foreach($produk as $item)
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
                <!-- Header Card -->
                <div class="flex items-start justify-between mb-3">
                    <div class="flex items-center gap-3 flex-1">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-100 to-orange-200 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-box text-orange-600"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="font-semibold text-gray-800 text-sm truncate">{{ $item->nama }}</p>
                            <p class="text-xs text-gray-500">#{{ $item->kode }}</p>
                        </div>
                    </div>
                    @if($item->status == 'Tersedia')
                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium inline-flex items-center gap-1 flex-shrink-0">
                            <i class="fas fa-check-circle"></i>
                        </span>
                    @else
                        <span class="px-2 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium inline-flex items-center gap-1 flex-shrink-0">
                            <i class="fas fa-exclamation-circle"></i>
                        </span>
                    @endif
                </div>

                <!-- Info Grid -->
                <div class="grid grid-cols-2 gap-3 mb-3 text-sm">
                    <div>
                        <p class="text-gray-500 text-xs mb-1">Kategori</p>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium inline-block">
                            {{ $item->kategori }}
                        </span>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs mb-1">Satuan</p>
                        <p class="font-medium text-gray-800">{{ $item->satuan }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs mb-1">Harga</p>
                        <p class="font-semibold text-gray-800">
                            Rp {{ number_format($item->harga, 0, ',', '.') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-500 text-xs mb-1">Stok</p>
                        <p class="font-medium text-gray-800">{{ $item->stok }} {{ $item->satuan }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                    <button onclick="viewProduct('{{ $item->id }}')" 
                            class="flex-1 p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all text-sm font-medium">
                        <i class="fas fa-eye mr-1"></i> Detail
                    </button>
                    <button onclick="editProduct({{ $item->id }})" 
                            class="flex-1 p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all text-sm font-medium">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                    <button onclick="deleteProduct('{{ $item->id }}')" 
                            class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-all">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        @include('layouts.footer')
    </div>

    <!-- Modal Tambah/Edit Produk -->
    <div id="productModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 modal-backdrop">
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl max-w-2xl w-full my-8 max-h-[90vh] overflow-hidden flex flex-col modal-content">
            
            <!-- Modal Header -->
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-4 md:p-6 rounded-t-2xl md:rounded-t-3xl text-white flex-shrink-0">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 id="modalTitle" class="text-xl md:text-2xl font-bold flex items-center gap-2">
                            <i class="fas fa-box"></i>
                            <span id="modalTitleText">Produk</span>
                        </h2>
                        <p class="text-orange-100 text-xs md:text-sm mt-1">Isi form di bawah dengan lengkap</p>
                    </div>
                    <button onclick="closeModal()" class="p-2 hover:bg-white hover:bg-opacity-20 rounded-full transition-all flex-shrink-0">
                        <i class="fas fa-times text-lg md:text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Form -->
            <form id="productForm" action="{{ route('produk.store') }}" method="POST" class="p-4 md:p-6 space-y-4 overflow-y-auto flex-1 custom-scrollbar">
                @csrf
                <input type="hidden" id="methodInput" name="_method" value="">
                
                <!-- Nama Produk -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-tag text-orange-500 mr-1"></i>
                        Nama Produk <span class="text-red-500">*</span>
                    </label>
                    <input type="text" 
                           name="nama" 
                           id="inputNama"
                           placeholder="Contoh: Mie Instan Goreng" 
                           required
                           class="input-field w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-layer-group text-blue-500 mr-1"></i>
                            Kategori <span class="text-red-500">*</span>
                        </label>
                        <select name="kategori" 
                                id="inputKategori"
                                required
                                class="input-field w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                            <option value="">Pilih Kategori</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Makanan">Makanan</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Alat Tulis">Alat Tulis</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <!-- Satuan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-balance-scale text-purple-500 mr-1"></i>
                            Satuan <span class="text-red-500">*</span>
                        </label>
                        <select name="satuan" 
                                id="inputSatuan"
                                required
                                class="input-field w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                            <option value="">Pilih Satuan</option>
                            <option value="Unit">Unit</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Pack">Pack</option>
                            <option value="Box">Box</option>
                            <option value="Kg">Kg</option>
                            <option value="Liter">Liter</option>
                            <option value="Lusin">Lusin</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Harga -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-money-bill-wave text-green-500 mr-1"></i>
                            Harga <span class="text-red-500">*</span>
                        </label>
                        <div class="flex items-center border-2 border-gray-200 rounded-xl focus-within:border-orange-500 transition-all">
                            <span class="px-3 text-gray-500 font-medium text-sm">Rp</span>
                            <input type="text" 
                                   name="harga" 
                                   id="inputHarga"
                                   placeholder="0" 
                                   required
                                   class="input-field w-full px-3 py-2.5 rounded-r-xl focus:outline-none text-sm border-0" 
                                   oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                        </div>
                    </div>

                    <!-- Stok -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            <i class="fas fa-boxes text-indigo-500 mr-1"></i>
                            Stok <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               name="stok" 
                               id="inputStok"
                               placeholder="0" 
                               min="0"
                               required
                               class="input-field w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        <i class="fas fa-align-left text-gray-500 mr-1"></i>
                        Deskripsi (Opsional)
                    </label>
                    <textarea name="deskripsi" 
                              id="inputDeskripsi"
                              rows="3" 
                              placeholder="Deskripsi produk (opsional)..." 
                              class="input-field w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all resize-none text-sm"></textarea>
                </div>

                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" 
                            onclick="closeModal()" 
                            class="w-full sm:w-auto px-6 py-2.5 border-2 border-gray-300 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-all text-sm">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>
                    <button type="submit" 
                            class="w-full sm:w-auto px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all hover:scale-105 text-sm">
                        <i class="fas fa-save mr-2"></i>
                        <span id="submitButtonText">Simpan Produk</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Detail Produk Modal -->
    <div id="viewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl max-w-2xl w-full my-8 max-h-[90vh] overflow-hidden flex flex-col">
            
            <!-- Header with Gradient -->
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-4 md:p-6 flex-shrink-0">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold text-white flex items-center gap-2 md:gap-3">
                            <i class="fas fa-box-open text-lg md:text-xl"></i>
                            Detail Produk
                        </h2>
                        <p class="text-orange-100 text-xs md:text-sm mt-1">Informasi lengkap produk</p>
                    </div>
                    <button onclick="closeViewModal()" 
                            class="p-2 bg-white bg-opacity-20 hover:bg-opacity-30 rounded-full transition-all flex-shrink-0">
                        <i class="fas fa-times text-white text-lg md:text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Content -->
            <div class="p-4 md:p-6 space-y-4 overflow-y-auto flex-1">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nama Produk -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-tag text-orange-500"></i>
                            Nama Produk
                        </label>
                        <input type="text" id="viewNama" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 font-medium text-sm" 
                               readonly>
                    </div>

                    <!-- Kategori -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-layer-group text-blue-500"></i>
                            Kategori
                        </label>
                        <input type="text" id="viewKategori" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 font-medium text-sm" 
                               readonly>
                    </div>

                    <!-- Satuan -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-balance-scale text-purple-500"></i>
                            Satuan
                        </label>
                        <input type="text" id="viewSatuan" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 font-medium text-sm" 
                               readonly>
                    </div>

                    <!-- Harga -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-money-bill-wave text-green-500"></i>
                            Harga
                        </label>
                        <input type="text" id="viewHarga" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 font-bold text-base md:text-lg" 
                               readonly>
                    </div>

                    <!-- Stok -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-boxes text-indigo-500"></i>
                            Stok
                        </label>
                        <input type="text" id="viewStok" 
                               class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-800 font-bold text-base md:text-lg" 
                               readonly>
                    </div>

                    <!-- Deskripsi -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                            <i class="fas fa-align-left text-teal-500"></i>
                            Deskripsi
                        </label>
                        <textarea id="viewDeskripsi" 
                                  class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl bg-gray-50 text-gray-700 leading-relaxed resize-none text-sm" 
                                  rows="4" 
                                  readonly></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Success Notification -->
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '{{ session("success") }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
    @endif

    <script>
        function closeViewModal() {
            document.getElementById('viewModal').classList.add('hidden');
        }

        document.getElementById('viewModal').addEventListener('click', function(e) {
            if(e.target === this) {
                closeViewModal();
            }
        });

        function showAddModal() {
            document.getElementById('productModal').classList.remove('hidden');
            document.getElementById('modalTitleText').textContent = 'Tambah Produk';
            document.getElementById('submitButtonText').textContent = 'Simpan Produk';
            document.getElementById('methodInput').value = '';
            document.getElementById('productForm').action = '{{ route("produk.store") }}';
            resetForm();
        }

        function closeModal() {
            document.getElementById('productModal').classList.add('hidden');
            setTimeout(() => resetForm(), 300);
        }

        document.getElementById('productModal').addEventListener('click', function(e) {
            if(e.target === this) {
                closeModal();
            }
        });

        function resetForm() {
            document.getElementById('productForm').reset();
        }

        function viewProduct(id) {
            fetch('/produk/' + id)
                .then(res => res.json())
                .then(data => {
                    document.getElementById('viewModal').classList.remove('hidden');
                    document.getElementById('viewNama').value = data.nama;
                    document.getElementById('viewKategori').value = data.kategori;
                    document.getElementById('viewSatuan').value = data.satuan;
                    document.getElementById('viewHarga').value = 'Rp ' + Number(data.harga).toLocaleString('id-ID');
                    document.getElementById('viewStok').value = data.stok;
                    document.getElementById('viewDeskripsi').value = data.deskripsi || '-';
                })
                .catch(err => {
                    console.error('Error:', err);
                    alert('Gagal mengambil data produk!');
                });
        }

        function editProduct(id) {
            fetch('/produk/' + id + '/edit')
                .then(res => res.json())
                .then(data => {
                    document.getElementById('productModal').classList.remove('hidden');
                    document.getElementById('modalTitleText').textContent = 'Edit Produk';
                    document.getElementById('submitButtonText').textContent = 'Update Produk';
                    
                    document.getElementById('inputNama').value = data.nama;
                    document.getElementById('inputKategori').value = data.kategori;
                    document.getElementById('inputSatuan').value = data.satuan;
                    document.getElementById('inputHarga').value = data.harga;
                    document.getElementById('inputStok').value = data.stok;
                    document.getElementById('inputDeskripsi').value = data.deskripsi;

                    const form = document.getElementById('productForm');
                    form.action = '/produk/' + id;
                    
                    document.getElementById('methodInput').value = 'PUT';
                })
                .catch(err => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal mengambil data produk'
                    });
                });
        }

        function deleteProduct(id) {
            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Produk ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#F97316',
                cancelButtonColor: '#6B7280',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = document.createElement('form');
                    form.method = 'POST';
                    form.action = '/produk/' + id;

                    let csrfInput = document.createElement('input');
                    csrfInput.type = 'hidden';
                    csrfInput.name = '_token';
                    csrfInput.value = '{{ csrf_token() }}';
                    form.appendChild(csrfInput);

                    let methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);

                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }

        // Close with Escape key
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') {
                closeModal();
                closeViewModal();
            }
        });

        // SEARCH BAR DAN FILTER - Updated untuk dual view
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const kategoriFilter = document.querySelectorAll("select")[0];
            const tableBody = document.getElementById("productTableBody");
            const cardBody = document.getElementById("productCardBody");

            const originalTableRows = tableBody ? Array.from(tableBody.querySelectorAll("tr")) : [];
            const originalCards = cardBody ? Array.from(cardBody.querySelectorAll("div.bg-white")) : [];

            function filterTable() {
                const searchValue = searchInput.value.toLowerCase().trim();
                const kategoriValue = kategoriFilter.value.toLowerCase().trim();

                // Filter Table (Desktop)
                if (tableBody) {
                    tableBody.innerHTML = "";
                    let visibleTableCount = 0;

                    originalTableRows.forEach(row => {
                        const namaProduk = row.querySelector("td:nth-child(2) p").textContent.toLowerCase();
                        const kategori = row.querySelector("td:nth-child(3) span").textContent.toLowerCase();

                        const matchSearch = namaProduk.includes(searchValue);
                        const matchKategori = kategoriValue === "semua kategori" || kategori.includes(kategoriValue);

                        if (matchSearch && matchKategori) {
                            tableBody.appendChild(row);
                            visibleTableCount++;
                        }
                    });

                    if (visibleTableCount === 0) {
                        const tr = document.createElement("tr");
                        tr.innerHTML = `
                            <td colspan="7" class="text-center py-6 text-gray-500">
                                <i class="fas fa-box-open text-gray-400 mr-2"></i>
                                Tidak ada produk yang cocok
                            </td>`;
                        tableBody.appendChild(tr);
                    }
                }

                // Filter Cards (Mobile)
                if (cardBody) {
                    cardBody.innerHTML = "";
                    let visibleCardCount = 0;

                    originalCards.forEach(card => {
                        const namaProduk = card.querySelector("p.font-semibold").textContent.toLowerCase();
                        const kategori = card.querySelector(".bg-blue-100").textContent.toLowerCase().trim();

                        const matchSearch = namaProduk.includes(searchValue);
                        const matchKategori = kategoriValue === "semua kategori" || kategori.includes(kategoriValue);

                        if (matchSearch && matchKategori) {
                            cardBody.appendChild(card);
                            visibleCardCount++;
                        }
                    });

                    if (visibleCardCount === 0) {
                        const emptyCard = document.createElement("div");
                        emptyCard.className = "bg-white rounded-2xl shadow-lg border border-gray-100 p-6 text-center";
                        emptyCard.innerHTML = `
                            <i class="fas fa-box-open text-gray-400 text-3xl mb-2"></i>
                            <p class="text-gray-500">Tidak ada produk yang cocok</p>
                        `;
                        cardBody.appendChild(emptyCard);
                    }
                }
            }

            searchInput.addEventListener("input", filterTable);
            kategoriFilter.addEventListener("change", filterTable);
        });
    </script>

</body>
</html>