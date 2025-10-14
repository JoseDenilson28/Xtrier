<aside id="sidebar" 
     class="fixed inset-y-0 top-16 left-0 w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-40 
         lg:translate-x-0 lg:static flex flex-col">


    <div class="p-6 border-b border-gray-200 flex justify-between items-center">
      <h2 class="text-2xl font-bold text-green-600">Menu do Paciente</h2>
      <!-- Botão fechar mobile -->
      <button id="closeSidebar" class="lg:hidden text-gray-600 hover:text-gray-900">
        ✖
      </button>
    </div>
    <nav class="flex-1 p-4 space-y-2">
      <a href="/Xtrier/public/paciente/dashboard" 
         class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-green-50 text-gray-700 font-medium transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
        </svg>
        Início
      </a>
      <a href="/Xtrier/public/paciente/triagem" 
         class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-green-50 text-gray-700 font-medium transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
        </svg>
        Nova Triagem
      </a>
      <a href="/Xtrier/public/paciente/consultas" 
         class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-green-50 text-gray-700 font-medium transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 19h14" />
        </svg>
        Minhas Consultas
      </a>
      <a href="/Xtrier/public/paciente/perfil" 
         class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-green-50 text-gray-700 font-medium transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10.97 10.97 0 0112 15c2.28 0 4.373.767 6.003 2.051M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
        </svg>
        Meu Perfil
      </a>
    </nav>
  </aside>
 <script>
  const sidebar = document.getElementById('sidebar');
  const openBtn = document.getElementById('openSidebar');
  const closeBtn = document.getElementById('closeSidebar');

  openBtn.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full');
  });
  closeBtn.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
  });
</script>
