<?php include_once "../app/views/layout/header.php"; ?>

<div class="flex min-h-screen bg-gray-100 pt-16">
  <!-- Sidebar -->
  <?php include_once "../app/views/layout/sidebar_paciente.php"; ?>

    <!-- Conteúdo Principal -->
    <main class="flex-1 p-8 space-y-10">
        <!-- Cabeçalho do Perfil -->
        <section class="relative bg-gradient-to-r from-green-700 to-green-500 rounded-2xl p-6 shadow-lg text-white flex flex-col md:flex-row items-center gap-6">
            <!-- Avatar -->
            
            <?php
            function corPorNome($nome) {
                $hash = md5($nome);
                return substr($hash, 0, 6); // usa os 6 primeiros caracteres da hash
            }

            $corFundo = corPorNome($_SESSION['user']['nome']);
            $nome = urlencode($_SESSION['user']['nome']);
            ?>
            <div class="relative w-36 h-36 rounded-full overflow-hidden ring-4 ring-white shadow-lg">
                <img src="https://ui-avatars.com/api/?name=<?php echo $nome; ?>&background=<?php echo $corFundo; ?>&color=fff&size=200" 
                    alt="Foto de Perfil" class="w-full h-full object-cover">
            </div>
            <!-- Dados principais -->
            <div>
            <h1 class="text-3xl font-extrabold tracking-tight"><?php echo htmlspecialchars($_SESSION['user']['nome']); ?></h1>
            <p class="text-sm text-white/80"><?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
            <p class="text-sm text-white/80 mt-1 flex items-center gap-1">
                
                <path d="M10 20a8 8 0 100-16 8 8 0 000 16zm0-14a6 6 0 110 12 6 6 0 010-12z" />
                </svg>
                Paciente desde <?php echo date('d/m/Y', strtotime($_SESSION['user']['criado_em'])); ?>
            </p>
            </div>
        </section>

        <!-- Formulário -->
        <form action="/Xtrier/public/paciente/perfil" method="POST" enctype="multipart/form-data" id="formPerfil" class="max-w-5xl mx-auto space-y-8">

            <!-- Informações Pessoais -->
            <section class="bg-white rounded-2xl shadow p-6 border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Informações Pessoais
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                <label for="nome" class="block text-sm font-semibold text-gray-700 mb-1">Nome Completo</label>
                <input type="text" id="nome" name="nome" required
                    value="<?php echo htmlspecialchars($_SESSION['user']['nome']); ?>"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" id="email" name="email" required
                    value="<?php echo htmlspecialchars($_SESSION['user']['email']); ?>"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="telefone" class="block text-sm font-semibold text-gray-700 mb-1">Telefone</label>
                <input type="text" id="telefone" name="telefone"
                    value="<?php echo htmlspecialchars($_SESSION['user']['telefone'] ?? ''); ?>"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="endereco" class="block text-sm font-semibold text-gray-700 mb-1">Endereço</label>
                <input type="text" id="endereco" name="endereco"
                    value="<?php echo htmlspecialchars($_SESSION['user']['endereco'] ?? ''); ?>"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="data_nascimento" class="block text-sm font-semibold text-gray-700 mb-1">Data de Nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento"
                    value="<?php echo htmlspecialchars($_SESSION['user']['data_nascimento'] ?? ''); ?>"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="genero" class="block text-sm font-semibold text-gray-700 mb-1">Gênero</label>
                <select id="genero" name="genero"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="">Selecione</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
                </div>
            </div>
            </section>

            <!-- Dados Médicos Básicos -->
            <section class="bg-white rounded-2xl shadow p-6 border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6h6v6m-3-9h.01" />
                </svg>
                Dados Clínicos
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                <label for="tipo_sanguineo" class="block text-sm font-semibold text-gray-700 mb-1">Tipo Sanguíneo</label>
                <select id="tipo_sanguineo" name="tipo_sanguineo" class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                    <option value="">Selecione</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                </div>
                <div>
                <label for="alergias" class="block text-sm font-semibold text-gray-700 mb-1">Alergias</label>
                <input type="text" id="alergias" name="alergias" placeholder="Ex: Penicilina, frutos do mar..."
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="condicoes" class="block text-sm font-semibold text-gray-700 mb-1">Condições Médicas</label>
                <input type="text" id="condicoes" name="condicoes" placeholder="Ex: Hipertensão, Diabetes..."
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="medicamentos" class="block text-sm font-semibold text-gray-700 mb-1">Medicamentos em uso</label>
                <input type="text" id="medicamentos" name="medicamentos" placeholder="Ex: Ibuprofeno, Metformina..."
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            </section>

            <!-- Contato de Emergência -->
            <section class="bg-white rounded-2xl shadow p-6 border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405M4 4l16 16" />
                </svg>
                Contato de Emergência
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                <label for="emergencia_nome" class="block text-sm font-semibold text-gray-700 mb-1">Nome do Contato</label>
                <input type="text" id="emergencia_nome" name="emergencia_nome"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="emergencia_telefone" class="block text-sm font-semibold text-gray-700 mb-1">Telefone</label>
                <input type="text" id="emergencia_telefone" name="emergencia_telefone"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            </section>

            <!-- Segurança -->
            <section class="bg-white rounded-2xl shadow p-6 border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-6 border-b pb-2 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0-2.28 1.72-4 4-4s4 1.72 4 4c0 1.48-.87 2.73-2.13 3.42L12 21l-5.87-6.58C5.87 13.73 5 12.48 5 11c0-2.28 1.72-4 4-4s4 1.72 4 4z" />
                </svg>
                Segurança da Conta
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                <label for="senha" class="block text-sm font-semibold text-gray-700 mb-1">Nova Senha</label>
                <input type="password" id="senha" name="senha" placeholder="Deixe em branco para não alterar"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="senha_confirmar" class="block text-sm font-semibold text-gray-700 mb-1">Confirmar Senha</label>
                <input type="password" id="senha_confirmar" name="senha_confirmar"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
                <div>
                <label for="senha_atual" class="block text-sm font-semibold text-gray-700 mb-1">Senha Atual</label>
                <input type="password" id="senha_atual" name="senha_atual" placeholder="Obrigatório para salvar alterações"
                    class="w-full rounded-lg border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>
            </div>
            </section>

            <!-- Botão Final -->
            <div class="sticky bottom-4 flex justify-end">
            <button type="submit" 
                class="px-8 py-3 bg-green-600 text-white font-semibold rounded-full shadow-lg hover:bg-green-700 transition">
                💾 Salvar Alterações
            </button>
            </div>
        </form>
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

