<!-- Sidebar Responsif -->
<!-- Tombol Toggle (Muncul hanya di layar kecil) -->
<div class="fixed top-4 left-4 z-50 md:hidden">
  <button id="sidebarToggle" class="p-2 bg-orange-600 text-white rounded-lg shadow-lg focus:outline-none">
    <i class="fas fa-bars text-lg"></i>
  </button>
</div>

<!-- Overlay (latar belakang gelap saat sidebar dibuka di HP) -->
<div id="sidebarOverlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"></div>

<!-- Sidebar -->
<div id="sidebar"
  class="fixed left-0 top-0 h-full w-64 bg-gradient-to-b from-orange-600 to-orange-800 shadow-2xl z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
  
  <div class="p-6">
    <!-- Logo -->
    <div class="flex items-center gap-3 mb-8 pb-6 border-b border-orange-400">
      <div class="bg-white p-3 rounded-xl shadow-lg">
        <i class="fas fa-gem text-orange-600 text-2xl"></i>
      </div>
      <div>
        <h2 class="text-white font-bold text-lg">Cahaya Gemilang</h2>
        <p class="text-orange-200 text-xs">Kelola Kedai Anda</p>
      </div>

      <!-- Tombol close di mobile -->
      <button id="closeSidebar" class="ml-auto text-orange-200 hover:text-white md:hidden">
        <i class="fas fa-times"></i>
      </button>
    </div>

    <!-- Menu Navigation -->
    <nav class="space-y-2">
      <!-- Dashboard -->
      <a href="{{ route('dashboard') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all
          {{ request()->routeIs('dashboard') 
              ? 'bg-white bg-opacity-20 text-white' 
              : 'text-orange-100 hover:bg-white hover:bg-opacity-10' }}">
        <i class="fas fa-home w-5"></i>
        <span>Dashboard</span>
      </a>

      <!-- Produk -->
      <a href="{{ route('produk.index') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all
          {{ request()->routeIs('produk.index') 
              ? 'bg-white bg-opacity-20 text-white' 
              : 'text-orange-100 hover:bg-white hover:bg-opacity-10' }}">
        <i class="fas fa-box w-5"></i>
        <span>Produk</span>
      </a>

      <!-- Kategori -->
      <a href="{{ route('kategori') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all
          {{ request()->routeIs('kategori') 
              ? 'bg-white bg-opacity-20 text-white' 
              : 'text-orange-100 hover:bg-white hover:bg-opacity-10' }}">
        <i class="fas fa-tags w-5"></i>
        <span>Kategori</span>
      </a>

      <!-- User -->
      <a href="{{ route('user') }}"
        class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium transition-all
          {{ request()->routeIs('user') 
              ? 'bg-white bg-opacity-20 text-white' 
              : 'text-orange-100 hover:bg-white hover:bg-opacity-10' }}">
        <i class="fas fa-users w-5"></i>
        <span>User</span>
      </a>
    </nav>
  </div>

  <!-- User Info Bottom -->
  <div class="absolute bottom-0 left-0 right-0 p-6 border-t border-orange-400">
    <div class="flex items-center gap-3">
      <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
        <i class="fas fa-user text-orange-600"></i>
      </div>
      <div class="flex-1">
        <p class="text-white text-sm font-medium">Admin Kedai</p>
        <p class="text-orange-200 text-xs">admin@cahaya.id</p>
      </div>
      <button class="text-orange-200 hover:text-white transition-colors">
        <i class="fas fa-sign-out-alt"></i>
      </button>
    </div>
  </div>
</div>

<!-- Script Toggle Sidebar -->
<script>
  const sidebar = document.getElementById('sidebar');
  const sidebarToggle = document.getElementById('sidebarToggle');
  const closeSidebar = document.getElementById('closeSidebar');
  const overlay = document.getElementById('sidebarOverlay');

  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');
  });

  closeSidebar.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
  });

  overlay.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
  });
</script>
