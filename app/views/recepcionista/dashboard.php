<?php include_once "../app/views/layout/header.php"; ?>

<div class="flex min-h-screen bg-gray-100 pt-16">
  <!-- Sidebar -->
  <?php include_once "../app/views/layout/sidebar_recepcao.php"; ?>

  <!-- Conteúdo Principal -->
  <main class="flex-1 p-8 space-y-10">

    <!-- Título e Saudação -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
          Painel da Recepção
        </h1>
        <p class="text-gray-600">Bem-vindo(a), <?= $user['nome'] ?? 'Recepcionista' ?> 👋</p>
      </div>
      <div class="text-gray-500 text-sm">
        <span id="dataAtual"></span> | <span id="horaAtual"></span>
      </div>
    </div>

    <!-- Cards Resumo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Pacientes Hoje</p>
        <h2 class="text-3xl font-bold text-green-600 mt-1">15</h2>
      </div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Consultas Agendadas</p>
        <h2 class="text-3xl font-bold text-blue-600 mt-1">8</h2>
      </div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Triagens Pendentes</p>
        <h2 class="text-3xl font-bold text-yellow-600 mt-1">3</h2>
      </div>
      <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
        <p class="text-gray-500 text-sm">Cancelamentos</p>
        <h2 class="text-3xl font-bold text-red-600 mt-1">1</h2>
      </div>
    </div>

    <!-- Triagens Recentes -->
    <section class="bg-white p-6 rounded-xl shadow space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-800">Triagens Recentes</h2>
        <a href="/Xtrier/public/recepcao/triagem" 
           class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
          + Nova Triagem
        </a>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg">
          <thead class="bg-gray-50">
            <tr class="text-left text-gray-600">
              <th class="px-4 py-2">Paciente</th>
              <th class="px-4 py-2">Horário</th>
              <th class="px-4 py-2">Motivo</th>
              <th class="px-4 py-2">Prioridade</th>
              <th class="px-4 py-2">Status</th>
              <th class="px-4 py-2 text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t hover:bg-gray-50 transition">
              <td class="px-4 py-2 font-medium">João Silva</td>
              <td class="px-4 py-2">09:30</td>
              <td class="px-4 py-2">Dor no dente</td>
              <td class="px-4 py-2 text-yellow-600 font-semibold">Média</td>
              <td class="px-4 py-2 text-gray-600">Aguardando</td>
              <td class="px-4 py-2 text-center space-x-2">
                <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Encaminhar</button>
                <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Cancelar</button>
              </td>
            </tr>
            <!-- Outras linhas dinâmicas -->
          </tbody>
        </table>
      </div>
    </section>

    <!-- Agenda do Dia -->
    <section class="bg-white p-6 rounded-xl shadow space-y-4">
      <div class="flex items-center justify-between">
        <h2 class="text-xl font-bold text-gray-800">Agenda do Dia</h2>
      </div>

      <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg">
          <thead class="bg-gray-50">
            <tr class="text-left text-gray-600">
              <th class="px-4 py-2">Hora</th>
              <th class="px-4 py-2">Paciente</th>
              <th class="px-4 py-2">Doutor</th>
              <th class="px-4 py-2">Procedimento</th>
              <th class="px-4 py-2">Status</th>
              <th class="px-4 py-2 text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-t hover:bg-gray-50 transition">
              <td class="px-4 py-2">10:00</td>
              <td class="px-4 py-2 font-medium">Maria Santos</td>
              <td class="px-4 py-2">Dr. Carlos</td>
              <td class="px-4 py-2">Aparelho</td>
              <td class="px-4 py-2 text-green-600 font-semibold">Confirmada</td>
              <td class="px-4 py-2 text-center space-x-2">
                <button class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Reagendar</button>
                <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Cancelar</button>
              </td>
            </tr>
            <!-- Outras consultas dinâmicas -->
          </tbody>
        </table>
      </div>
    </section>

  </main>

  <!-- Botão Flutuante de Ação Rápida -->
  <div class="fixed bottom-8 right-8 space-y-2 flex flex-col z-40">
    <button onclick="window.location.href='/Xtrier/public/recepcao/triagem'"
            class="px-5 py-3 bg-green-600 text-white rounded-full shadow-lg hover:bg-green-700 transition">
      ➕ Triagem
    </button>
    <button onclick="window.location.href='/Xtrier/public/recepcao/paciente'"
            class="px-5 py-3 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition">
      👤 Paciente
    </button>
  </div>
</div>

<!-- Script para Data e Hora -->
<script>
  function atualizarDataHora() {
    const agora = new Date();
    document.getElementById('dataAtual').textContent = agora.toLocaleDateString();
    document.getElementById('horaAtual').textContent = agora.toLocaleTimeString();
  }
  setInterval(atualizarDataHora, 1000);
  atualizarDataHora();
</script>

<?php include_once "../app/views/layout/footer.php"; ?>
