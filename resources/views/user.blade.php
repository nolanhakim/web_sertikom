<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen User - Kedai Cahaya Gemilang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
    </style>
</head>
<body class="bg-gray-50">
    
    @include('layouts.sidebar')

    <!-- Main Content -->
    <div class="sidebar-offset ml-0 md:ml-64 p-4 md:p-8">
        
        <!-- Top Bar -->
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 md:mb-8 gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-1">Manajemen User</h1>
                <p class="text-sm md:text-base text-gray-500">Kelola pengguna dan hak akses sistem 👥</p>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-6 mb-6 md:mb-8">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl md:rounded-3xl p-4 md:p-6 text-white shadow-xl hover:shadow-2xl transition-all">
                <div class="flex justify-between items-start mb-2 md:mb-4">
                    <div class="bg-white bg-opacity-20 p-2 md:p-3 rounded-xl md:rounded-2xl">
                        <i class="fas fa-users text-lg md:text-2xl"></i>
                    </div>
                </div>
                <h3 class="text-2xl md:text-4xl font-bold mb-1 md:mb-2">8</h3>
                <p class="text-blue-100 font-medium text-xs md:text-base">Total User</p>
            </div>

            <div class="bg-white rounded-2xl md:rounded-3xl p-4 md:p-6 shadow-lg hover:shadow-xl transition-all border border-gray-100">
                <div class="flex justify-between items-start mb-2 md:mb-4">
                    <div class="bg-green-100 p-2 md:p-3 rounded-xl md:rounded-2xl">
                        <i class="fas fa-cash-register text-lg md:text-2xl text-green-600"></i>
                    </div>
                </div>
                <h3 class="text-2xl md:text-4xl font-bold text-gray-800 mb-1 md:mb-2">6</h3>
                <p class="text-gray-600 font-medium text-xs md:text-base">Kasir</p>
            </div>

            <div class="bg-white rounded-2xl md:rounded-3xl p-4 md:p-6 shadow-lg hover:shadow-xl transition-all border border-gray-100">
                <div class="flex justify-between items-start mb-2 md:mb-4">
                    <div class="bg-orange-100 p-2 md:p-3 rounded-xl md:rounded-2xl">
                        <i class="fas fa-user-shield text-lg md:text-2xl text-orange-600"></i>
                    </div>
                </div>
                <h3 class="text-2xl md:text-4xl font-bold text-gray-800 mb-1 md:mb-2">2</h3>
                <p class="text-gray-600 font-medium text-xs md:text-base">Admin</p>
            </div>

            <div class="bg-white rounded-2xl md:rounded-3xl p-4 md:p-6 shadow-lg hover:shadow-xl transition-all border border-gray-100">
                <div class="flex justify-between items-start mb-2 md:mb-4">
                    <div class="bg-purple-100 p-2 md:p-3 rounded-xl md:rounded-2xl">
                        <i class="fas fa-user-tie text-lg md:text-2xl text-purple-600"></i>
                    </div>
                </div>
                <h3 class="text-2xl md:text-4xl font-bold text-gray-800 mb-1 md:mb-2">6</h3>
                <p class="text-gray-600 font-medium text-xs md:text-base">Staff</p>
            </div>
        </div>

        <!-- Action Bar & Filters -->
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg p-4 md:p-6 mb-4 md:mb-6 border border-gray-100">
            <div class="flex flex-col gap-3 md:gap-4">
                <!-- Search & Filter -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 w-full">
                    <div class="relative w-full sm:flex-1 sm:max-w-xs">
                        <input type="text" id="searchInput" placeholder="Cari user..." 
                               class="w-full pl-10 pr-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                        <i class="fas fa-search absolute left-3 top-3.5 text-gray-400"></i>
                    </div>
                    <select id="roleFilter" class="px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all w-full sm:w-auto text-sm">
                        <option>Semua Role</option>
                        <option>Admin</option>
                        <option>Staff</option>
                        <option>Kasir</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-3 w-full">
                    <button onclick="showAddUserModal()" 
                            class="flex items-center justify-center gap-2 px-4 md:px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all hover:scale-105 w-full sm:w-auto text-sm">
                        <i class="fas fa-user-plus"></i>
                        <span>Tambah User</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Users Table - Desktop View -->
        <div class="hidden md:block bg-white rounded-3xl shadow-lg border border-gray-100">
            <div class="overflow-x-auto table-scroll">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-gray-100">
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">USER</th>
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">EMAIL</th>
                            <th class="text-left py-4 px-6 text-gray-600 font-semibold text-sm">ROLE</th>
                            <th class="text-center py-4 px-6 text-gray-600 font-semibold text-sm">AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <!-- User Row 1 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        AD
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Admin Utama</p>
                                        <p class="text-xs text-gray-500">ID: USR001</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">admin@cahaya.id</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                                    <i class="fas fa-user-shield"></i> Admin
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="viewUser('USR001')" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editUser('USR001')" class="p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="resetPassword('USR001')" class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all" title="Reset Password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- User Row 2 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        BS
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Budi Santoso</p>
                                        <p class="text-xs text-gray-500">ID: USR002</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">budi@cahaya.id</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                                    <i class="fas fa-user-tie"></i> Staff
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="viewUser('USR002')" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editUser('USR002')" class="p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="resetPassword('USR002')" class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all" title="Reset Password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- User Row 3 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        SA
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Siti Aminah</p>
                                        <p class="text-xs text-gray-500">ID: USR003</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">siti@cahaya.id</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                                    <i class="fas fa-cash-register"></i> Kasir
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="viewUser('USR003')" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editUser('USR003')" class="p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="resetPassword('USR003')" class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all" title="Reset Password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- User Row 4 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        AP
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Andi Pratama</p>
                                        <p class="text-xs text-gray-500">ID: USR004</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">andi@cahaya.id</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                                    <i class="fas fa-user-tie"></i> Staff
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="viewUser('USR004')" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editUser('USR004')" class="p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="resetPassword('USR004')" class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all" title="Reset Password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- User Row 5 -->
                        <tr class="border-b border-gray-50 hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg">
                                        DL
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800">Dewi Lestari</p>
                                        <p class="text-xs text-gray-500">ID: USR005</p>
                                    </div>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">dewi@cahaya.id</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium inline-flex items-center gap-1">
                                    <i class="fas fa-cash-register"></i> Kasir
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="viewUser('USR005')" class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button onclick="editUser('USR005')" class="p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button onclick="resetPassword('USR005')" class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all" title="Reset Password">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Users Cards - Mobile View -->
        <div class="md:hidden space-y-3" id="userCardBody">
            <!-- User Card 1 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                        AD
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 text-sm truncate">Admin Utama</p>
                        <p class="text-xs text-gray-500 mb-2">ID: USR001</p>
                        <p class="text-xs text-gray-600 truncate">admin@cahaya.id</p>
                    </div>
                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium inline-flex items-center gap-1 flex-shrink-0">
                        <i class="fas fa-user-shield"></i>
                    </span>
                </div>
                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                    <button onclick="viewUser('USR001')" 
                            class="flex-1 p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all text-xs font-medium">
                        <i class="fas fa-eye mr-1"></i> Detail
                    </button>
                    <button onclick="editUser('USR001')" 
                            class="flex-1 p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all text-xs font-medium">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                    <button onclick="resetPassword('USR001')" 
                            class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all">
                        <i class="fas fa-key"></i>
                    </button>
                </div>
            </div>

            <!-- User Card 2 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-14 h-14 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                        BS
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 text-sm truncate">Budi Santoso</p>
                        <p class="text-xs text-gray-500 mb-2">ID: USR002</p>
                        <p class="text-xs text-gray-600 truncate">budi@cahaya.id</p>
                    </div>
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium inline-flex items-center gap-1 flex-shrink-0">
                        <i class="fas fa-user-tie"></i>
                    </span>
                </div>
                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                    <button onclick="viewUser('USR002')" 
                            class="flex-1 p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all text-xs font-medium">
                        <i class="fas fa-eye mr-1"></i> Detail
                    </button>
                    <button onclick="editUser('USR002')" 
                            class="flex-1 p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all text-xs font-medium">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                    <button onclick="resetPassword('USR002')" 
                            class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all">
                        <i class="fas fa-key"></i>
                    </button>
                </div>
            </div>

            <!-- User Card 3 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-14 h-14 bg-gradient-to-br from-purple-400 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                        SA
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 text-sm truncate">Siti Aminah</p>
                        <p class="text-xs text-gray-500 mb-2">ID: USR003</p>
                        <p class="text-xs text-gray-600 truncate">siti@cahaya.id</p>
                    </div>
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium inline-flex items-center gap-1 flex-shrink-0">
                        <i class="fas fa-cash-register"></i>
                    </span>
                </div>
                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                    <button onclick="viewUser('USR003')" 
                            class="flex-1 p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all text-xs font-medium">
                        <i class="fas fa-eye mr-1"></i> Detail
                    </button>
                    <button onclick="editUser('USR003')" 
                            class="flex-1 p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all text-xs font-medium">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                    <button onclick="resetPassword('USR003')" 
                            class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all">
                        <i class="fas fa-key"></i>
                    </button>
                </div>
            </div>

            <!-- User Card 4 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-14 h-14 bg-gradient-to-br from-green-400 to-green-600 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                        AP
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 text-sm truncate">Andi Pratama</p>
                        <p class="text-xs text-gray-500 mb-2">ID: USR004</p>
                        <p class="text-xs text-gray-600 truncate">andi@cahaya.id</p>
                    </div>
                    <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded-lg text-xs font-medium inline-flex items-center gap-1 flex-shrink-0">
                        <i class="fas fa-user-tie"></i>
                    </span>
                </div>
                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                    <button onclick="viewUser('USR004')" 
                            class="flex-1 p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all text-xs font-medium">
                        <i class="fas fa-eye mr-1"></i> Detail
                    </button>
                    <button onclick="editUser('USR004')" 
                            class="flex-1 p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all text-xs font-medium">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                    <button onclick="resetPassword('USR004')" 
                            class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all">
                        <i class="fas fa-key"></i>
                    </button>
                </div>
            </div>

            <!-- User Card 5 -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-4">
                <div class="flex items-start gap-3 mb-3">
                    <div class="w-14 h-14 bg-gradient-to-br from-pink-400 to-pink-600 rounded-full flex items-center justify-center text-white font-bold text-lg flex-shrink-0">
                        DL
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 text-sm truncate">Dewi Lestari</p>
                        <p class="text-xs text-gray-500 mb-2">ID: USR005</p>
                        <p class="text-xs text-gray-600 truncate">dewi@cahaya.id</p>
                    </div>
                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded-lg text-xs font-medium inline-flex items-center gap-1 flex-shrink-0">
                        <i class="fas fa-cash-register"></i>
                    </span>
                </div>
                <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
                    <button onclick="viewUser('USR005')" 
                            class="flex-1 p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all text-xs font-medium">
                        <i class="fas fa-eye mr-1"></i> Detail
                    </button>
                    <button onclick="editUser('USR005')" 
                            class="flex-1 p-2 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-100 transition-all text-xs font-medium">
                        <i class="fas fa-edit mr-1"></i> Edit
                    </button>
                    <button onclick="resetPassword('USR005')" 
                            class="p-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition-all">
                        <i class="fas fa-key"></i>
                    </button>
                </div>
            </div>
        </div>



        @include('layouts.footer')
    </div>

    <!-- Modal Tambah/Edit User -->
    <div id="userModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl max-w-2xl w-full my-8 max-h-[90vh] overflow-hidden flex flex-col">
            <div class="bg-gradient-to-r from-orange-500 to-orange-600 p-4 md:p-6 rounded-t-2xl md:rounded-t-3xl text-white flex-shrink-0">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-xl md:text-2xl font-bold">Tambah User Baru</h2>
                        <p class="text-orange-100 text-xs md:text-sm mt-1">Isi form di bawah untuk menambahkan user</p>
                    </div>
                    <button onclick="closeModal()" class="p-2 hover:bg-white hover:bg-opacity-20 rounded-full transition-all flex-shrink-0">
                        <i class="fas fa-times text-lg md:text-xl"></i>
                    </button>
                </div>
            </div>

            <form class="p-4 md:p-6 space-y-4 overflow-y-auto flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Username</label>
                        <input type="text" placeholder="Username" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                        <input type="email" placeholder="email@example.com" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">No. Telepon</label>
                        <input type="tel" placeholder="08123456789" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                        <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
                        <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Role</label>
                        <select class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all text-sm">
                            <option>Pilih Role</option>
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                    <textarea rows="3" placeholder="Alamat lengkap..." class="w-full px-4 py-2.5 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:outline-none transition-all resize-none text-sm"></textarea>
                </div>

                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                    <button type="button" onclick="closeModal()" class="w-full sm:w-auto px-6 py-2.5 border-2 border-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-all text-sm">
                        Batal
                    </button>
                    <button type="submit" class="w-full sm:w-auto px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all hover:scale-105 text-sm">
                        <i class="fas fa-save mr-2"></i>Simpan User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal View User Details -->
    <div id="viewUserModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl md:rounded-3xl shadow-2xl max-w-2xl w-full my-8 max-h-[90vh] overflow-hidden flex flex-col">
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 p-4 md:p-6 rounded-t-2xl md:rounded-t-3xl text-white flex-shrink-0">
                <div class="flex justify-between items-start">
                    <div class="flex items-center gap-3 md:gap-4">
                        <div class="w-16 h-16 md:w-20 md:h-20 bg-white bg-opacity-20 rounded-full flex items-center justify-center text-2xl md:text-3xl font-bold">
                            AD
                        </div>
                        <div>
                            <h2 class="text-xl md:text-2xl font-bold">Admin Utama</h2>
                            <p class="text-blue-100 text-xs md:text-sm">admin@cahaya.id</p>
                        </div>
                    </div>
                    <button onclick="closeViewModal()" class="p-2 hover:bg-white hover:bg-opacity-20 rounded-full transition-all flex-shrink-0">
                        <i class="fas fa-times text-lg md:text-xl"></i>
                    </button>
                </div>
            </div>

            <div class="p-4 md:p-6 space-y-4 md:space-y-6 overflow-y-auto flex-1">
                <!-- Info Dasar -->
                <div>
                    <h3 class="text-base md:text-lg font-bold text-gray-800 mb-3 md:mb-4 flex items-center gap-2">
                        <i class="fas fa-user-circle text-orange-600"></i>
                        Informasi Dasar
                    </h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 md:gap-4">
                        <div class="bg-gray-50 p-3 md:p-4 rounded-xl">
                            <p class="text-xs text-gray-500 mb-1">User ID</p>
                            <p class="font-semibold text-gray-800 text-sm">USR001</p>
                        </div>
                        <div class="bg-gray-50 p-3 md:p-4 rounded-xl">
                            <p class="text-xs text-gray-500 mb-1">Username</p>
                            <p class="font-semibold text-gray-800 text-sm">admin_utama</p>
                        </div>
                        <div class="bg-gray-50 p-3 md:p-4 rounded-xl">
                            <p class="text-xs text-gray-500 mb-1">No. Telepon</p>
                            <p class="font-semibold text-gray-800 text-sm">081234567890</p>
                        </div>
                        <div class="bg-gray-50 p-3 md:p-4 rounded-xl">
                            <p class="text-xs text-gray-500 mb-1">Role</p>
                            <span class="inline-block px-3 py-1 bg-red-100 text-red-700 rounded-lg text-xs font-medium">
                                <i class="fas fa-user-shield"></i> Admin
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <h3 class="text-base md:text-lg font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-orange-600"></i>
                        Alamat
                    </h3>
                    <div class="bg-gray-50 p-3 md:p-4 rounded-xl">
                        <p class="text-gray-700 text-sm">Jl. Merdeka No. 123, Malang, Jawa Timur 65111</p>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-100">
                    <button onclick="closeViewModal()" class="w-full sm:w-auto px-6 py-2.5 border-2 border-gray-200 text-gray-700 rounded-xl font-semibold hover:bg-gray-50 transition-all text-sm">
                        Tutup
                    </button>
                    <button onclick="editUser('USR001')" class="w-full sm:w-auto px-6 py-2.5 bg-gradient-to-r from-orange-500 to-orange-600 text-white rounded-xl font-semibold shadow-lg hover:shadow-xl transition-all hover:scale-105 text-sm">
                        <i class="fas fa-edit mr-2"></i>Edit User
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showAddUserModal() {
            document.getElementById('userModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('userModal').classList.add('hidden');
        }

        function closeViewModal() {
            document.getElementById('viewUserModal').classList.add('hidden');
        }

        function viewUser(id) {
            document.getElementById('viewUserModal').classList.remove('hidden');
        }

        function editUser(id) {
            closeViewModal();
            showAddUserModal();
            alert('Edit user: ' + id);
        }

        function resetPassword(id) {
            if(confirm('Apakah Anda yakin ingin mereset password user ini?\nPassword baru akan dikirim ke email user.')) {
                alert('Password user ' + id + ' berhasil direset!');
            }
        }

        // Close modal when clicking outside
        document.getElementById('userModal').addEventListener('click', function(e) {
            if(e.target === this) {
                closeModal();
            }
        });

        document.getElementById('viewUserModal').addEventListener('click', function(e) {
            if(e.target === this) {
                closeViewModal();
            }
        });

        // Search and Filter functionality
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("searchInput");
            const roleFilter = document.getElementById("roleFilter");
            const statusFilter = document.getElementById("statusFilter");
            const tableBody = document.getElementById("userTableBody");
            const cardBody = document.getElementById("userCardBody");

            const originalTableRows = tableBody ? Array.from(tableBody.querySelectorAll("tr")) : [];
            const originalCards = cardBody ? Array.from(cardBody.querySelectorAll(".bg-white")) : [];

            function filterUsers() {
                const searchValue = searchInput.value.toLowerCase().trim();
                const roleValue = roleFilter.value.toLowerCase().trim();
                const statusValue = statusFilter.value.toLowerCase().trim();

                // Filter Table (Desktop)
                if (tableBody) {
                    tableBody.innerHTML = "";
                    let visibleTableCount = 0;

                    originalTableRows.forEach(row => {
                        const userName = row.querySelector(".font-semibold").textContent.toLowerCase();
                        const userEmail = row.querySelectorAll("td")[1].textContent.toLowerCase();
                        const userRole = row.querySelector("td:nth-child(3) span").textContent.toLowerCase();

                        const matchSearch = userName.includes(searchValue) || userEmail.includes(searchValue);
                        const matchRole = roleValue === "semua role" || userRole.includes(roleValue);

                        if (matchSearch && matchRole) {
                            tableBody.appendChild(row);
                            visibleTableCount++;
                        }
                    });

                    if (visibleTableCount === 0) {
                        const tr = document.createElement("tr");
                        tr.innerHTML = `
                            <td colspan="4" class="text-center py-6 text-gray-500">
                                <i class="fas fa-user-slash text-gray-400 mr-2"></i>
                                Tidak ada user yang cocok
                            </td>`;
                        tableBody.appendChild(tr);
                    }
                }

                // Filter Cards (Mobile)
                if (cardBody) {
                    cardBody.innerHTML = "";
                    let visibleCardCount = 0;

                    originalCards.forEach(card => {
                        const userName = card.querySelector(".font-semibold").textContent.toLowerCase();
                        const userEmail = card.querySelector(".text-gray-600").textContent.toLowerCase();
                        const userRole = card.querySelector("span.inline-flex").textContent.toLowerCase();

                        const matchSearch = userName.includes(searchValue) || userEmail.includes(searchValue);
                        const matchRole = roleValue === "semua role" || userRole.includes(roleValue);

                        if (matchSearch && matchRole) {
                            cardBody.appendChild(card);
                            visibleCardCount++;
                        }
                    });

                    if (visibleCardCount === 0) {
                        const emptyCard = document.createElement("div");
                        emptyCard.className = "bg-white rounded-2xl shadow-lg border border-gray-100 p-6 text-center";
                        emptyCard.innerHTML = `
                            <i class="fas fa-user-slash text-gray-400 text-3xl mb-2"></i>
                            <p class="text-gray-500 text-sm">Tidak ada user yang cocok</p>
                        `;
                        cardBody.appendChild(emptyCard);
                    }
                }
            }

            searchInput.addEventListener("input", filterUsers);
            roleFilter.addEventListener("change", filterUsers);
            statusFilter.addEventListener("change", filterUsers);
        });
    </script>
</body>
</html>