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
          Pacientes
        </h1>
        <p class="text-gray-600">Gerencie os pacientes aqui</p>
      </div>
      <div class="text-gray-500 text-sm">
        <span id="dataAtual"></span> | <span id="horaAtual"></span>
      </div>
    </div>

    <!-- Tabela de Pacientes -->
    <div class="overflow-x-auto">
      <table class="min-w-full border border-gray-200 rounded-lg">
        <thead class="bg-gray-50">
          <tr class="text-left text-gray-600">
            <th class="px-4 py-2">Nome</th>
            <th class="px-4 py-2">Idade</th>
            <th class="px-4 py-2">Gênero</th>
            <th class="px-4 py-2">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr class="border-t hover:bg-gray-50 transition">
            <td class="px-4 py-2 font-medium">João Silva</td>
            <td class="px-4 py-2">30</td>
            <td class="px-4 py-2">Masculino</td>
            <td class="px-4 py-2 text-center space-x-2">
              <button class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Editar</button>
              <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Excluir</button>
            </td>
          </tr>
          <!-- Outras linhas dinâmicas -->
        </tbody>
      </table>
    </div>

  </main>

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
