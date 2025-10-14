<?php include_once "../app/views/layout/header.php"; ?>
<div class="flex min-h-screen bg-gray-100 pt-16">
  <!-- Sidebar -->
  <?php include_once "../app/views/layout/sidebar_recepcao.php"; ?>

  <!-- Conteúdo Principal -->
  <main class="flex-1 p-8 space-y-10">

    <!-- Cabeçalho -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
          Pacientes
        </h1>
        <p class="text-gray-600">Gerencie, edite ou cadastre novos pacientes.</p>
      </div>
      <div class="text-gray-500 text-sm">
        <span id="dataAtual"></span> | <span id="horaAtual"></span>
      </div>
    </div>

    <!-- Barra de Ferramentas -->
    <div class="flex flex-col md:flex-row justify-between gap-4">
      <div class="relative w-full md:w-1/2">
        <input type="text" id="buscarPaciente" placeholder="Buscar por nome ou telefone..."
               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" />
        
      </div>
      <button id="abrirModalNovoPaciente"
              class="px-6 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition">
        + Novo Paciente
      </button>
    </div>


    <!-- Tabela de Pacientes -->
    <div class="overflow-x-auto rounded-lg shadow">
      <table class="min-w-full border border-gray-200 bg-white">
        <thead class="bg-gray-50">
          <tr class="text-left text-gray-600">
            <th class="px-4 py-2">Nome</th>
            <th class="px-4 py-2">Telefone</th>
            <th class="px-4 py-2">Idade</th>
            <th class="px-4 py-2">Gênero</th>
            <th class="px-4 py-2 text-center">Ações</th>
          </tr>
        </thead>
        <tbody id="tabelaPacientes">
          <?php foreach ($data['pacientes'] as $pac): ?>
            <tr class="border-t hover:bg-gray-50 transition">
              <td><?= htmlspecialchars($pac['nome']) ?></td>
              <td><?= htmlspecialchars($pac['telefone']) ?></td>
              <td><?= htmlspecialchars($pac['idade']) ?></td>
              <td><?= htmlspecialchars($pac['genero']) ?></td>
              <td class="px-4 py-2 text-center space-x-2">
                <button data-id="<?= $pac['id'] ?>" class="btn-editar px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Editar</button>
                <button data-id="<?= $pac['id'] ?>" class="btn-excluir px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Excluir</button>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Lista de Pacientes (Mobile) -->
     <div class="md:hidden space-y-3" id="listaPacientesMobile">
      <?php foreach ($data['pacientes'] as $pac): ?>
        <div class="bg-white rounded-lg shadow p-4 flex justify-between items-center">
          <div>
            <p class="font-bold text-gray-800"><?= htmlspecialchars($pac['nome']) ?></p>
            <p class="text-gray-500 text-sm"><?= htmlspecialchars($pac['telefone']) ?></p>
          </div>
          <div class="space-x-2">
            <button data-id="<?= $pac['id'] ?>" class="btn-editar px-2 py-1 bg-blue-500 text-white rounded">✏️</button>
            <button data-id="<?= $pac['id'] ?>" class="btn-excluir px-2 py-1 bg-red-500 text-white rounded">🗑️</button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Paginação -->
     <!-- Paginação -->
<div class="flex justify-center items-center mt-4 space-x-2">
  <button id="prevPage" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Anterior</button>
  <span id="paginaInfo" class="px-2 text-gray-600"></span>
  <button id="nextPage" class="px-3 py-1 bg-gray-300 rounded hover:bg-gray-400">Próximo</button>
</div>

    <div class="flex justify-center items-center mt-4 space-x-2">
      <?php for($i = 1; $i <= $data['totalPaginas']; $i++): ?>
        <a href="?pagina=<?= $i ?>" 
          class="px-3 py-1 rounded <?= $i == $data['paginaAtual'] ? 'bg-blue-600 text-white' : 'bg-gray-200 hover:bg-gray-300' ?>">
          <?= $i ?>
        </a>
      <?php endfor; ?>
    </div>

  </main>
</div>

<!-- ================= Modal Novo Paciente ================= -->
<div id="modalNovoPaciente" class="hidden fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50">
  <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-8 relative">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Cadastrar Novo Paciente</h2>
    <form action="/Xtrier/public/recepcionista/cadastrarPaciente" method="POST" class="space-y-4">

      <div>
        <label class="block text-sm font-semibold mb-1">Nome Completo</label>
        <input type="text" name="nome" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold mb-1">Telefone</label>
          <input type="text" name="telefone" required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">Email</label>
          <input type="email" name="email"
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold mb-1">Idade</label>
          <input type="number" name="idade" required
                 class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
        </div>
        <div>
          <label class="block text-sm font-semibold mb-1">Gênero</label>
          <select name="genero" required
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
            <option value="">Selecione</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
          </select>
        </div>
      </div>

      <div>
        <label class="block text-sm font-semibold mb-1">Endereço</label>
        <input type="text" name="endereco" required
               class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-500">
      </div>

      <div class="flex justify-end space-x-3 pt-4">
        <button type="button" id="fecharModalNovoPaciente"
                class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition">
          Cancelar
        </button>
        <button type="submit"
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
          Salvar
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Scripts -->
<script>
  /***************** 🧭 UTILITÁRIOS *****************/
  const $ = (selector) => document.querySelector(selector);
  const $$ = (selector) => document.querySelectorAll(selector);

  /***************** 📆 DATA E HORA *****************/
  function iniciarRelogio() {
    const atualizarDataHora = () => {
      const agora = new Date();
      $('#dataAtual').textContent = agora.toLocaleDateString();
      $('#horaAtual').textContent = agora.toLocaleTimeString();
    };
    atualizarDataHora();
    setInterval(atualizarDataHora, 1000);
  }

  /***************** 🟢 MODAL *****************/
  function configurarModal() {
    const modal = $('#modalNovoPaciente');
    const abrirBtn = $('#abrirModalNovoPaciente');
    const fecharBtn = $('#fecharModalNovoPaciente');

    abrirBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    fecharBtn.addEventListener('click', () => modal.classList.add('hidden'));
  }

  /***************** 🔍 FILTRO DE BUSCA *****************/
  function configurarBusca() {
    const campo = $('#buscarPaciente');
    campo.addEventListener('input', () => {
      const termo = campo.value.toLowerCase();
      $$('#tabelaPacientes tr').forEach((tr) => {
        const nome = tr.querySelector('td')?.textContent.toLowerCase() || '';
        const telefone = tr.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
        tr.style.display = (nome.includes(termo) || telefone.includes(termo)) ? '' : 'none';
      });
    });
  }

  /***************** 📊 PAGINAÇÃO *****************/
  function configurarPaginacao(linhasPorPagina = 5) {
    let paginaAtual = 1;

    const paginarTabela = () => {
      const linhas = $$('#tabelaPacientes tr');
      const totalPaginas = Math.ceil(linhas.length / linhasPorPagina);

      linhas.forEach((linha, i) => {
        linha.style.display = (i >= (paginaAtual - 1) * linhasPorPagina && i < paginaAtual * linhasPorPagina)
          ? '' : 'none';
      });

      $('#paginaInfo').textContent = `Página ${paginaAtual} de ${totalPaginas}`;
      $('#prevPage').disabled = (paginaAtual === 1);
      $('#nextPage').disabled = (paginaAtual === totalPaginas);
    };

    $('#prevPage').addEventListener('click', () => {
      if (paginaAtual > 1) {
        paginaAtual--;
        paginarTabela();
      }
    });

    $('#nextPage').addEventListener('click', () => {
      const totalPaginas = Math.ceil($$('#tabelaPacientes tr').length / linhasPorPagina);
      if (paginaAtual < totalPaginas) {
        paginaAtual++;
        paginarTabela();
      }
    });

    paginarTabela();
  }

  /***************** ✏️ AÇÕES (Editar / Excluir) *****************/
  function configurarAcoes() {
    // Editar
    $$('.btn-editar').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.dataset.id;
        window.location.href = `/Xtrier/public/recepcionista/editarPaciente/${id}`;
      });
    });

    // Excluir
    $$('.btn-excluir').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.dataset.id;
        Swal.fire({
          title: "Tem certeza?",
          text: "Essa ação não poderá ser desfeita!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Sim, excluir",
          cancelButtonText: "Cancelar"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = `/Xtrier/public/recepcionista/deletarPaciente/${id}`;
          }
        });
      });
    });
  }

  /***************** 🚀 INICIALIZAÇÃO *****************/
  document.addEventListener('DOMContentLoaded', () => {
    iniciarRelogio();
    configurarModal();
    configurarBusca();
    configurarPaginacao(10);
    configurarAcoes();
  });
</script>



<?php include_once "../app/views/layout/footer.php"; ?>
