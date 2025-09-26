<?php include_once "../app/views/layout/header.php"; ?>

<div class="flex min-h-screen bg-gray-100 pt-16">
  <!-- Sidebar -->
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
      <a href="/Xtrier/public/paciente/exames" 
         class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-green-50 text-gray-700 font-medium transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h13v6H9zM4 10V6h5v4H4z" />
        </svg>
        Meus Exames
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

  <!-- Conteúdo Principal -->
  <main class="flex-1 p-8 space-y-10">
    <!-- Cabeçalho -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <div class="flex items-center gap-4">
        <!-- Botão Hamburguer (visível só em telas < lg) -->
        <button id="openSidebar" 
                class="lg:hidden p-2 rounded-md text-black hover:bg-green-700 transition">
          <svg xmlns="http://www.w3.org/2000/svg" 
              class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>

        <div>
          <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Painel do Paciente</h1>
          <p class="text-gray-600">Bem-vindo, 
            <span class="font-semibold text-green-700"><?= $user['nome'] ?? 'Paciente' ?></span> 👋
          </p>
        </div>
      </div>
      <a href="/Xtrier/public/paciente/triagem" 
         class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-medium rounded-lg shadow hover:bg-green-700 transition">
         ➕ Nova Triagem
      </a>
    </div>

    <!-- Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <!-- Próxima Consulta -->
      <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md p-6 transition text-center">
        <div class="flex justify-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 19h14M7 15h.01M11 15h2m4 0h.01"/>
          </svg>
        </div>
        <h3 class="text-sm font-medium text-gray-500 uppercase">Próxima Consulta</h3>
        <p class="text-lg font-bold text-gray-900 mt-1">12/10/2025</p>
        <p class="text-gray-600 text-sm">com Dr. Silva</p>
      </div>

      <!-- Fila -->
      <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md p-6 transition text-center">
        <div class="flex justify-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
          </svg>
        </div>
        <h3 class="text-sm font-medium text-gray-500 uppercase">Minha Fila</h3>
        <p class="text-3xl font-extrabold text-blue-600 mt-1">#05</p>
        <p class="text-gray-600 text-sm">Posição atual</p>
      </div>

      <!-- Notificações -->
      <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md p-6 transition text-center">
        <div class="flex justify-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405M19.5 12A7.5 7.5 0 1112 4.5 7.5 7.5 0 0119.5 12z"/>
          </svg>
        </div>
        <h3 class="text-sm font-medium text-gray-500 uppercase">Notificações</h3>
        <p class="text-lg font-bold text-red-600 mt-1">2 novas</p>
        <p class="text-gray-600 text-sm">Avisos importantes</p>
      </div>

      <!-- Histórico -->
      <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md p-6 transition text-center">
        <div class="flex justify-center mb-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 6h13M8 12h13M8 18h13M3 6h.01M3 12h.01M3 18h.01"/>
          </svg>
        </div>
        <h3 class="text-sm font-medium text-gray-500 uppercase">Histórico</h3>
        <p class="text-lg font-bold text-gray-900 mt-1">14 consultas</p>
        <p class="text-gray-600 text-sm">já realizadas</p>
      </div>
    </div>

    <!-- Ações Rápidas -->
    <div>
      <h2 class="text-xl font-bold text-gray-900 mb-4">Ações Rápidas</h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <a href="/Xtrier/public/paciente/exames" 
           class="bg-gradient-to-r from-purple-600 to-purple-700 text-white shadow-lg rounded-xl p-6 text-center hover:shadow-xl transition transform hover:-translate-y-1">
          <h2 class="text-lg font-bold mb-2">Meus Exames</h2>
          <p class="text-sm opacity-80">Veja resultados e documentos médicos.</p>
        </a>
        <a href="/Xtrier/public/paciente/consultas" 
           class="bg-gradient-to-r from-blue-600 to-blue-700 text-white shadow-lg rounded-xl p-6 text-center hover:shadow-xl transition transform hover:-translate-y-1">
          <h2 class="text-lg font-bold mb-2">Minhas Consultas</h2>
          <p class="text-sm opacity-80">Veja histórico e próximas consultas.</p>
        </a>
        <a href="/Xtrier/public/paciente/perfil" 
           class="bg-gradient-to-r from-gray-700 to-gray-800 text-white shadow-lg rounded-xl p-6 text-center hover:shadow-xl transition transform hover:-translate-y-1">
          <h2 class="text-lg font-bold mb-2">Meu Perfil</h2>
          <p class="text-sm opacity-80">Atualize seus dados pessoais.</p>
        </a>
      </div>
    </div>
  </main>
</div>

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

<?php include_once "../app/views/layout/footer.php"; ?>
