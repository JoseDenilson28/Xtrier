<?php include_once "../app/views/layout/header.php"; ?>

<div class="flex min-h-screen bg-gray-100 pt-16">
    
  <!-- Sidebar -->
  <?php include_once "../app/views/layout/sidebar_paciente.php"; ?>

  <!-- Conteúdo Principal -->
  <main class="flex-1 p-8 space-y-10">
    
    <!-- Cabeçalho -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <div class="flex items-center gap-4">
        <button id="openSidebar" class="lg:hidden p-2 rounded-md text-black hover:bg-green-700 transition">
          <svg xmlns="http://www.w3.org/2000/svg" 
               class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
        <div>
          <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Minhas Consultas</h1>
          <p class="text-gray-600">Veja todas as suas consultas agendadas e passadas.</p>
        </div>
      </div>
    </div>

    <!-- Tabela de Consultas -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

  <!-- Card 1 - Agendada -->
  <div class="bg-white rounded-2xl shadow p-5 border border-gray-200 flex flex-col gap-2 hover:shadow-lg transition">
    <div class="flex justify-between items-center">
      <h2 class="text-lg font-bold text-gray-800">
        15/10/2025 — 10:00
      </h2>
      <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Agendada</span>
    </div>
    <div class="flex justify-between items-center text-sm text-gray-600">
      <span>Médico: <strong>Dr. Silva</strong></span>
      <span class="font-semibold text-yellow-600">Média</span>
    </div>
    <p class="text-gray-500 text-sm mt-2">
      Retorno de avaliação ortodôntica.
    </p>
  </div>

  <!-- Card 2 - Concluída -->
  <div class="bg-white rounded-2xl shadow p-5 border border-gray-200 flex flex-col gap-2 hover:shadow-lg transition">
    <div class="flex justify-between items-center">
      <h2 class="text-lg font-bold text-gray-800">
        12/10/2025 — 15:30
      </h2>
      <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Concluída</span>
    </div>
    <div class="flex justify-between items-center text-sm text-gray-600">
      <span>Médico: <strong>Dr. Santos</strong></span>
      <span class="font-semibold text-green-600">Baixa</span>
    </div>
    <p class="text-gray-500 text-sm mt-2">
      Ajuste do aparelho realizado com sucesso.
    </p>
  </div>

  <!-- Card 3 - Cancelada -->
  <div class="bg-white rounded-2xl shadow p-5 border border-gray-200 flex flex-col gap-2 hover:shadow-lg transition">
    <div class="flex justify-between items-center">
      <h2 class="text-lg font-bold text-gray-800">
        10/10/2025 — 09:00
      </h2>
      <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Cancelada</span>
    </div>
    <div class="flex justify-between items-center text-sm text-gray-600">
      <span>Médico: <strong>Dr. Costa</strong></span>
      <span class="font-semibold text-red-600">Alta</span>
    </div>
    <p class="text-gray-500 text-sm mt-2">
      Consulta cancelada pelo paciente.
    </p>
  </div>

  <!-- Card 3 - Cancelada -->
  <div class="bg-white rounded-2xl shadow p-5 border border-gray-200 flex flex-col gap-2 hover:shadow-lg transition">
    <div class="flex justify-between items-center">
      <h2 class="text-lg font-bold text-gray-800">
        10/10/2025 — 09:00
      </h2>
      <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Cancelada</span>
    </div>
    <div class="flex justify-between items-center text-sm text-gray-600">
      <span>Médico: <strong>Dr. Costa</strong></span>
      <span class="font-semibold text-red-600">Alta</span>
    </div>
    <p class="text-gray-500 text-sm mt-2">
      Consulta cancelada pelo paciente.
    </p>
  </div>

</div>



  </main>
</div>