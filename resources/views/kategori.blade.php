<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori - Kedai Cahaya Gemilang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Responsive sidebar handling */
        @media (max-width: 768px) {
            .sidebar-offset {
                margin-left: 0 !important;
            }
        }
    </style>
</head>
<body class="bg-gray-50">
    
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="sidebar-offset ml-0 md:ml-64 p-4 md:p-8">
        
        <!-- Top Bar -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 md:mb-8 gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">Kategori Produk</h1>
                <p class="text-sm md:text-base text-gray-500">Kelola kategori untuk mengorganisir produk 🏷️</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 md:gap-6 mb-6 md:mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl md:rounded-3xl p-5 md:p-6 text-white shadow-xl hover:shadow-2xl transition-all">
                <div class="flex justify-between items-start mb-3 md:mb-4">
                    <div class="bg-white bg-opacity-20 p-2.5 md:p-3 rounded-xl md:rounded-2xl">
                        <i class="fas fa-layer-group text-xl md:text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-3xl md:text-4xl font-bold mb-1 md:mb-2">6</h3>
                <p class="text-blue-100 font-medium text-sm md:text-base">Total Kategori</p>
            </div>

            <div class="bg-white rounded-2xl md:rounded-3xl p-5 md:p-6 shadow-lg hover:shadow-xl transition-all border border-gray-100">
                <div class="flex justify-between items-start mb-3 md:mb-4">
                    <div class="bg-orange-100 p-2.5 md:p-3 rounded-xl md:rounded-2xl">
                        <i class="fas fa-boxes text-xl md:text-2xl text-orange-600"></i>
                    </div>
                </div>
                <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-1 md:mb-2">128</h3>
                <p class="text-gray-600 font-medium text-sm md:text-base">Total Produk</p>
            </div>
        </div>

        <!-- Action Bar -->
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg p-4 md:p-6 mb-4 md:mb-6 border border-gray-100">
            <div class="flex flex-col sm:flex-row justify-between items-stretch sm:items-center gap-3 md:gap-4">
                <div class="relative w-full sm:flex-1 sm:max-w-xs md:max-w-sm">
                    <input type="text" id="searchInput" placeholder="Cari kategori..." 
                           class="w-full pl-10 pr-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                    <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                </div>
                <button onclick="showAddCategoryModal()" 
                        class="flex items-center justify-center gap-2 px-4 md:px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all hover:scale-105 w-full sm:w-auto text-sm">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Kategori</span>
                </button>
            </div>
        </div>

        <!-- Categories Grid -->
        <div id="categoryGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
            
            <!-- Category Card 1 -->
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg hover:shadow-2xl transition-all border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 p-5 md:p-6 text-white">
                    <div class="flex justify-between items-start mb-3 md:mb-4">
                        <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-xl md:rounded-2xl">
                            <i class="fas fa-mobile-alt text-2xl md:text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-1">Elektronik</h3>
                    <p class="text-blue-100 text-xs md:text-sm">KAT-001</p>
                </div>
                <div class="p-4 md:p-6">
                    <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">Peralatan dan gadget elektronik</p>
                    <div class="flex items-center justify-between mb-3 md:mb-4 text-xs md:text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-box text-blue-500"></i>
                            <span class="text-gray-700 font-semibold">45 Produk</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-calendar text-gray-400"></i>
                            <span class="text-gray-500">15 Jan 2024</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="viewCategory('KAT-001')" 
                                class="flex-1 py-2 bg-blue-50 text-blue-600 rounded-lg md:rounded-xl font-medium hover:bg-blue-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button onclick="editCategory('KAT-001')" 
                                class="flex-1 py-2 bg-orange-50 text-orange-600 rounded-lg md:rounded-xl font-medium hover:bg-orange-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteCategory('KAT-001')" 
                                class="py-2 px-3 md:px-4 bg-red-50 text-red-600 rounded-lg md:rounded-xl font-medium hover:bg-red-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 2 -->
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg hover:shadow-2xl transition-all border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 p-5 md:p-6 text-white">
                    <div class="flex justify-between items-start mb-3 md:mb-4">
                        <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-xl md:rounded-2xl">
                            <i class="fas fa-tshirt text-2xl md:text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-1">Fashion</h3>
                    <p class="text-purple-100 text-xs md:text-sm">KAT-002</p>
                </div>
                <div class="p-4 md:p-6">
                    <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">Pakaian dan aksesoris fashion</p>
                    <div class="flex items-center justify-between mb-3 md:mb-4 text-xs md:text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-box text-purple-500"></i>
                            <span class="text-gray-700 font-semibold">32 Produk</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-calendar text-gray-400"></i>
                            <span class="text-gray-500">20 Jan 2024</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="viewCategory('KAT-002')" 
                                class="flex-1 py-2 bg-blue-50 text-blue-600 rounded-lg md:rounded-xl font-medium hover:bg-blue-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button onclick="editCategory('KAT-002')" 
                                class="flex-1 py-2 bg-orange-50 text-orange-600 rounded-lg md:rounded-xl font-medium hover:bg-orange-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteCategory('KAT-002')" 
                                class="py-2 px-3 md:px-4 bg-red-50 text-red-600 rounded-lg md:rounded-xl font-medium hover:bg-red-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 3 -->
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg hover:shadow-2xl transition-all border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-br from-red-500 to-red-600 p-5 md:p-6 text-white">
                    <div class="flex justify-between items-start mb-3 md:mb-4">
                        <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-xl md:rounded-2xl">
                            <i class="fas fa-pizza-slice text-2xl md:text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-1">Makanan</h3>
                    <p class="text-red-100 text-xs md:text-sm">KAT-003</p>
                </div>
                <div class="p-4 md:p-6">
                    <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">Makanan dan snack</p>
                    <div class="flex items-center justify-between mb-3 md:mb-4 text-xs md:text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-box text-red-500"></i>
                            <span class="text-gray-700 font-semibold">28 Produk</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-calendar text-gray-400"></i>
                            <span class="text-gray-500">05 Feb 2024</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="viewCategory('KAT-003')" 
                                class="flex-1 py-2 bg-blue-50 text-blue-600 rounded-lg md:rounded-xl font-medium hover:bg-blue-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button onclick="editCategory('KAT-003')" 
                                class="flex-1 py-2 bg-orange-50 text-orange-600 rounded-lg md:rounded-xl font-medium hover:bg-orange-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteCategory('KAT-003')" 
                                class="py-2 px-3 md:px-4 bg-red-50 text-red-600 rounded-lg md:rounded-xl font-medium hover:bg-red-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 4 -->
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg hover:shadow-2xl transition-all border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-br from-cyan-500 to-cyan-600 p-5 md:p-6 text-white">
                    <div class="flex justify-between items-start mb-3 md:mb-4">
                        <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-xl md:rounded-2xl">
                            <i class="fas fa-coffee text-2xl md:text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-1">Minuman</h3>
                    <p class="text-cyan-100 text-xs md:text-sm">KAT-004</p>
                </div>
                <div class="p-4 md:p-6">
                    <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">Minuman dan beverage</p>
                    <div class="flex items-center justify-between mb-3 md:mb-4 text-xs md:text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-box text-cyan-500"></i>
                            <span class="text-gray-700 font-semibold">15 Produk</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-calendar text-gray-400"></i>
                            <span class="text-gray-500">10 Feb 2024</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="viewCategory('KAT-004')" 
                                class="flex-1 py-2 bg-blue-50 text-blue-600 rounded-lg md:rounded-xl font-medium hover:bg-blue-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button onclick="editCategory('KAT-004')" 
                                class="flex-1 py-2 bg-orange-50 text-orange-600 rounded-lg md:rounded-xl font-medium hover:bg-orange-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteCategory('KAT-004')" 
                                class="py-2 px-3 md:px-4 bg-red-50 text-red-600 rounded-lg md:rounded-xl font-medium hover:bg-red-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 5 -->
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg hover:shadow-2xl transition-all border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-br from-green-500 to-green-600 p-5 md:p-6 text-white">
                    <div class="flex justify-between items-start mb-3 md:mb-4">
                        <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-xl md:rounded-2xl">
                            <i class="fas fa-couch text-2xl md:text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-1">Furniture</h3>
                    <p class="text-green-100 text-xs md:text-sm">KAT-005</p>
                </div>
                <div class="p-4 md:p-6">
                    <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">Perabotan rumah tangga</p>
                    <div class="flex items-center justify-between mb-3 md:mb-4 text-xs md:text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-box text-green-500"></i>
                            <span class="text-gray-700 font-semibold">6 Produk</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-calendar text-gray-400"></i>
                            <span class="text-gray-500">18 Feb 2024</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="viewCategory('KAT-005')" 
                                class="flex-1 py-2 bg-blue-50 text-blue-600 rounded-lg md:rounded-xl font-medium hover:bg-blue-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button onclick="editCategory('KAT-005')" 
                                class="flex-1 py-2 bg-orange-50 text-orange-600 rounded-lg md:rounded-xl font-medium hover:bg-orange-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteCategory('KAT-005')" 
                                class="py-2 px-3 md:px-4 bg-red-50 text-red-600 rounded-lg md:rounded-xl font-medium hover:bg-red-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Category Card 6 -->
            <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg hover:shadow-2xl transition-all border border-gray-100 overflow-hidden group">
                <div class="bg-gradient-to-br from-gray-500 to-gray-600 p-5 md:p-6 text-white">
                    <div class="flex justify-between items-start mb-3 md:mb-4">
                        <div class="bg-white bg-opacity-20 p-3 md:p-4 rounded-xl md:rounded-2xl">
                            <i class="fas fa-book text-2xl md:text-3xl"></i>
                        </div>
                    </div>
                    <h3 class="text-xl md:text-2xl font-bold mb-1">Buku</h3>
                    <p class="text-gray-200 text-xs md:text-sm">KAT-006</p>
                </div>
                <div class="p-4 md:p-6">
                    <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">Buku dan alat tulis</p>
                    <div class="flex items-center justify-between mb-3 md:mb-4 text-xs md:text-sm">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-box text-gray-500"></i>
                            <span class="text-gray-700 font-semibold">2 Produk</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-calendar text-gray-400"></i>
                            <span class="text-gray-500">25 Feb 2024</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="viewCategory('KAT-006')" 
                                class="flex-1 py-2 bg-blue-50 text-blue-600 rounded-lg md:rounded-xl font-medium hover:bg-blue-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-eye"></i> Detail
                        </button>
                        <button onclick="editCategory('KAT-006')" 
                                class="flex-1 py-2 bg-orange-50 text-orange-600 rounded-lg md:rounded-xl font-medium hover:bg-orange-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <button onclick="deleteCategory('KAT-006')" 
                                class="py-2 px-3 md:px-4 bg-red-50 text-red-600 rounded-lg md:rounded-xl font-medium hover:bg-red-100 transition-all text-xs md:text-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>

        @include('layouts.footer')
    </div>

    <!-- Modal Tambah/Edit Kategori -->
    <div id="categoryModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl max-w-lg w-full my-8 max-h-[90vh] overflow-hidden flex flex-col">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-4 md:p-6 rounded-t-2xl md:rounded-t-3xl text-white flex-shrink-0">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold">Tambah Kategori Baru</h2>
                        <p class="text-orange-100 text-xs md:text-sm mt-1">Isi form di bawah untuk menambah kategori</p>
                    </div>
                    <button onclick="closeModal()" class="p-2 hover:bg-white hover:bg-opacity-20 rounded-full transition-all flex-shrink-0">
                        <i class="fas fa-times text-lg md:text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Scroll hanya di bagian form -->
            <form class="p-4 md:p-6 space-y-4 overflow-y-auto flex-1">
                <!-- Nama Kategori -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" placeholder="Nama kategori" 
                           class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                </div>

                <!-- Icon -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Icon</label>
                    <select class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                        <option value="">Pilih Icon</option>
                        <option value="mobile-alt">📱 Mobile/Gadget</option>
                        <option value="laptop">💻 Laptop</option>
                        <option value="tshirt">👕 Fashion</option>
                        <option value="pizza-slice">🍕 Makanan</option>
                        <option value="coffee">☕ Minuman</option>
                        <option value="couch">🛋️ Furniture</option>
                        <option value="book">📚 Buku</option>
                        <option value="gamepad">🎮 Gaming</option>
                    </select>
                </div>

                <!-- Warna -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Warna</label>
                    <div class="grid grid-cols-5 gap-2 md:gap-3">
                        <button type="button" class="w-10 h-10 md:w-12 md:h-12 bg-blue-500 rounded-xl hover:scale-110 transition-all"></button>
                        <button type="button" class="w-10 h-10 md:w-12 md:h-12 bg-purple-500 rounded-xl hover:scale-110 transition-all"></button>
                        <button type="button" class="w-10 h-10 md:w-12 md:h-12 bg-red-500 rounded-xl hover:scale-110 transition-all"></button>
                        <button type="button" class="w-10 h-10 md:w-12 md:h-12 bg-green-500 rounded-xl hover:scale-110 transition-all"></button>
                        <button type="button" class="w-10 h-10 md:w-12 md:h-12 bg-orange-500 rounded-xl hover:scale-110 transition-all"></button>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                    <textarea rows="3" placeholder="Deskripsi kategori..." 
                              class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all resize-none text-sm"></textarea>
                </div>

                <!-- Tombol -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                    <button type="button" onclick="closeModal()" 
                            class="w-full sm:w-auto px-6 py-2.5 border-2 border-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-all text-sm">
                        Batal
                    </button>
                    <button type="submit" 
                            class="w-full sm:w-auto px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all hover:scale-105 text-sm">
                        <i class="fas fa-save mr-2"></i>Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showAddCategoryModal() {
            document.getElementById('categoryModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('categoryModal').classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('categoryModal').addEventListener('click', function(e) {
            if(e.target === this) {
                closeModal();
            }
        });

        function viewCategory(id) {
            alert('Menampilkan detail kategori: ' + id);
        }

        function editCategory(id) {
            showAddCategoryModal();
            alert('Edit kategori: ' + id);
        }

        function deleteCategory(id) {
            if(confirm('Apakah Anda yakin ingin menghapus kategori ini?\nProduk dalam kategori ini akan tetap ada.')) {
                alert('Kategori ' + id + ' dihapus!');
            }
        }

        // Search functionality
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const categoryGrid = document.getElementById("categoryGrid");
            const originalCards = Array.from(categoryGrid.querySelectorAll(".group"));

            searchInput.addEventListener("input", function() {
                const searchValue = this.value.toLowerCase().trim();
                
                categoryGrid.innerHTML = "";
                let visibleCount = 0;

                originalCards.forEach(card => {
                    const categoryName = card.querySelector("h3").textContent.toLowerCase();
                    const categoryDesc = card.querySelector("p.text-gray-600").textContent.toLowerCase();

                    if (categoryName.includes(searchValue) || categoryDesc.includes(searchValue)) {
                        categoryGrid.appendChild(card);
                        visibleCount++;
                    }
                });

                // Show no results message if needed
                if (visibleCount === 0) {
                    const noResultDiv = document.createElement("div");
                    noResultDiv.className = "col-span-full bg-white rounded-2xl md:rounded-3xl shadow-lg border border-gray-100 p-8 md:p-12 text-center";
                    noResultDiv.innerHTML = `
                        <i class="fas fa-search text-4xl md:text-5xl text-gray-300 mb-4"></i>
                        <h3 class="text-lg md:text-xl font-bold text-gray-700 mb-2">Kategori tidak ditemukan</h3>
                        <p class="text-sm md:text-base text-gray-500">Coba gunakan kata kunci lain</p>
                    `;
                    categoryGrid.appendChild(noResultDiv);
                }
            });
        });
    </script>
</body>
</html>