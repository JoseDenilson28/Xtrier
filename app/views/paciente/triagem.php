<?php include_once "../app/views/layout/header.php"; ?>

<div class="flex min-h-screen bg-gray-100 pt-16">
    
  <!-- Sidebar -->
  <?php include_once "../app/views/layout/sidebar.php"; ?>

  <!-- Conteúdo Principal -->
  <main class="flex-1 p-8 space-y-10">
    
    <!-- Cabeçalho -->
    <div class="flex items-center gap-4">
        <button id="openSidebar" class="lg:hidden p-2 rounded-md text-black hover:bg-green-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" 
                class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <div>
            <h1 class="text-3xl font-extrabold text-gray-9000 tracking-tight">Formulário de Triagem</h1>
            <p class="text-gray-600">Por favor, preencha o formulário abaixo para ajudar na avaliação inicial.</p>
        </div>
    </div>

    <!-- Formulário de Triagem -->
    <form action="/Xtrier/public/paciente/triagem" method="POST" id="formTriagem" 
        class="bg-white mx-auto p-8 rounded-2xl shadow-lg border border-gray-200 space-y-10">

        <!-- Dados pessoais -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
            <label for="nome" class="block text-sm font-semibold text-gray-700 mb-1">Nome Completo</label>
            <input type="text" id="nome" name="nome" required 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" value="<?php echo htmlspecialchars($_SESSION['user']['nome']); ?>">
            </div>
            <div>
            <label for="idade" class="block text-sm font-semibold text-gray-700 mb-1">Idade</label>
            <input type="number" id="idade" name="idade" required min="0" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition">
            </div>
        </div>

        <!-- Sintomas -->
        <div>
            <h2 class="text-lg font-bold text-gray-800 mb-3">Sintomas</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            <label class="flex items-center p-2 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" name="sintomas[]" value="dor_intensa" class="mr-2">
                Dor intensa
            </label>
            <label class="flex items-center p-2 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" name="sintomas[]" value="sangramento" class="mr-2">
                Sangramento gengival
            </label>
            <label class="flex items-center p-2 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" name="sintomas[]" value="mastigacao" class="mr-2">
                Dificuldade para mastigar
            </label>
            <label class="flex items-center p-2 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" name="sintomas[]" value="fala" class="mr-2">
                Dificuldade para falar
            </label>
            <label class="flex items-center p-2 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" name="sintomas[]" value="trauma" class="mr-2">
                Trauma recente (queda, batida, acidente)
            </label>
            <label class="flex items-center p-2 bg-gray-50 rounded-lg shadow-sm hover:bg-gray-100 cursor-pointer">
                <input type="checkbox" name="sintomas[]" value="aparelho_quebrado" class="mr-2">
                Aparelho quebrado/solto
            </label>
            </div>
        </div>

        <!-- Histórico Médico -->
        <div>
            <h2 class="text-lg font-bold text-gray-800 mb-3">Histórico Médico</h2>
            <textarea id="historico" name="historico" rows="4" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-3 shadow-sm focus:ring-2 focus:ring-green-500 focus:border-green-500 transition" 
                    placeholder="Ex: uso de medicamentos, doenças pré-existentes..."></textarea>
        </div>

        <!-- Botão -->
        <div class="flex justify-end">
            <button type="submit" 
                    class="px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow hover:bg-green-700 active:scale-95 transition">
            Enviar Triagem
            </button>
        </div>
    </form>

  </main>
</div>

<?php if (isset($_SESSION['alert'])): ?>
    <script>
        Swal.fire({
            icon: '<?php echo $_SESSION['alert']['icon']; ?>',
            title: '<?php echo $_SESSION['alert']['title']; ?>',
            text: '<?php echo $_SESSION['alert']['text']; ?>',
            confirmButtonColor: '#16a34a'
        });
    </script>
<?php unset($_SESSION['alert']); endif; ?>

<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('openSidebar')?.addEventListener('click', () => sidebar.classList.remove('-translate-x-full'));
  document.getElementById('closeSidebar')?.addEventListener('click', () => sidebar.classList.add('-translate-x-full'));

</script>

<?php include_once "../app/views/layout/footer.php"; ?>
