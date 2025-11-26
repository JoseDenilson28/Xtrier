<?php include_once "../app/views/layout/header.php"; ?>

<div class="flex min-h-screen bg-gray-100 pt-16">
    <!-- Sidebar -->
    <?php include_once "../app/views/layout/sidebar_recepcao.php"; ?>

    <!-- Conteúdo Principal -->
    <main class="flex-1 p-8 space-y-10">

        <!-- Header da Página -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">Gestão de Triagens</h1>
                <p class="mt-2 text-gray-600">Gerencie as triagens de pacientes de forma eficiente.</p>
            </div>
            <button onclick="openModal()"
                class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                + Nova Triagem
            </button>
        </div>

        <!-- Triagens Abertas -->
        <section>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Triagens Abertas</h2>

            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="w-full table-auto text-left">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="px-4 py-2">N°</th>
                            <th class="px-4 py-2">Paciente</th>
                            <th class="px-4 py-2">Sintomas</th>
                            <th class="px-4 py-2">Prioridade</th>
                            <th class="px-4 py-2">Data</th>
                            <th class="px-4 py-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="lista-triagens">
                        <tr>
                            <td colspan="6" class="text-center py-4">Carregando...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="paginacao" class="flex justify-center mt-4"></div>
        </section>

        <!-- Triagens Concluídas -->
        <section>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Triagens Concluídas</h2>
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="w-full table-auto text-left">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Paciente</th>
                            <th class="px-4 py-2">Motivo</th>
                            <th class="px-4 py-2">Prioridade</th>
                            <th class="px-4 py-2">Data</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemplo de linha -->
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">#0005</td>
                            <td class="px-4 py-2">Maria Santos</td>
                            <td class="px-4 py-2">Febre</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded-full bg-yellow-200 text-yellow-800 text-sm font-semibold">
                                    Média
                                </span>
                            </td>
                            <td class="px-4 py-2">12/10/2025 09:15</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded-full bg-green-200 text-green-800 text-sm font-semibold">
                                    Encaminhada
                                </span>
                            </td>
                            <td class="px-4 py-2 flex justify-center space-x-2">
                                <button class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">
                                    Reagendar
                                </button>
                            </td>
                        </tr>
                        <!-- Fim exemplo -->
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<!-- Modal Nova Triagem -->
<div id="triagemModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
        <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-red-600 text-xl">
            &times;
        </button>
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Cadastrar Nova Triagem</h2>
        <form method="POST" action="">
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Paciente:</label>
                <input type="search" name="paciente" id="paciente" placeholder="Buscar paciente..."
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-600">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Sintomas:</label>
                <textarea name="motivo" required rows="3"
                          class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Condições:</label>
                <label for="gestante" class="text-gray-700">Gestante</label>
                <input type="checkbox" name="gestante" id="gestante" class="mr-2">

                <label for="hipertenso" class="text-gray-600">Hipertenso</label>
                <input type="checkbox" name="hipertenso" id="hipertenso" class="mr-2">

                <label for="diabete" class="text-gray-600">Diabete</label>
                <input type="checkbox" name="diabete" id="diabete" class="mr-2">

                <label for="DST" class="text-gray-600">DST</label>
                <input type="checkbox" name="DST" id="DST" class="mr-2">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Prioridade:</label>
                <select name="prioridade" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300">
                    <option value="">Selecione</option>
                    <option value="baixa">Baixa</option>
                    <option value="média">Média</option>
                    <option value="alta">Alta</option>
                </select>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()"
                        class="px-4 py-2  bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Cancelar
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Salvar
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Encaminhar Triagem -->
<div id="modalEncaminhar" class="hidden fixed inset-0 bg-black/50 bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white w-96 rounded-lg shadow-lg p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">
            Encaminhar Triagem <span id="numeroTriagem" class="text-green-600"></span>
        </h3>

        <label class="block mb-2 text-sm font-medium text-gray-600">Selecionar Doutor</label>
        <select id="selectDoutor" class="w-full border px-3 py-2 rounded mb-4">
            <option value="">Carregando...</option>
        </select>

        <div class="mb-4">
            <label class="block font-medium text-gray-700 mb-1">Observações:</label>
            <textarea name="observacoes" rows="3"
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300"></textarea>
        </div>

        <div class="flex justify-end space-x-2">
            <button id="cancelarModalBtn"
                class="px-4 py-2  bg-red-600 text-white rounded hover:bg-red-700">
                Cancelar
            </button>
            <button id="confirmarEncaminharBtn"
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Encaminhar
            </button>
        </div>
    </div>
</div>


<script src="<?= BASE_URL ?>/assets/js/triagens.js"></script>


<?php include_once "../app/views/layout/footer.php"; ?>


