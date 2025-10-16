<?php include_once "../app/views/layout/header.php"; ?>

<div class="flex min-h-screen bg-gray-100 pt-16">
    <!-- Sidebar -->
    <?php include_once "../app/views/layout/sidebar_recepcao.php"; ?>

    <!-- Conteúdo Principal -->
    <main class="flex-1 p-8 space-y-10">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Agenda de Consultas</h1>
            <button onclick="openAgendaModal()" 
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                + Nova Consulta
            </button>
        </div>

        <!-- Filtros -->
        <div class="bg-white p-4 shadow rounded-lg flex flex-wrap gap-4 items-end">
            <div>
                <label class="block font-medium text-gray-700 mb-1">Data</label>
                <input type="date" name="data_filtro" 
                       class="px-4 py-2 border rounded-lg focus:ring focus:ring-green-300">
            </div>

            <div>
                <label class="block font-medium text-gray-700 mb-1">Doutor</label>
                <select name="doutor_filtro" 
                        class="px-4 py-2 border rounded-lg focus:ring focus:ring-green-300">
                    <option value="">Todos</option>
                    <option value="1">Dr. João</option>
                    <option value="2">Dra. Maria</option>
                </select>
            </div>

            <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Filtrar
            </button>
        </div>

        <!-- Agenda -->
        <section>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Consultas Agendadas</h2>
            <div class="overflow-x-auto bg-white shadow rounded-lg">
                <table class="w-full table-auto text-left">
                    <thead class="bg-green-600 text-white">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Paciente</th>
                            <th class="px-4 py-2">Doutor</th>
                            <th class="px-4 py-2">Data</th>
                            <th class="px-4 py-2">Hora</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Exemplo -->
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">#001</td>
                            <td class="px-4 py-2">João Silva</td>
                            <td class="px-4 py-2">Dr. João</td>
                            <td class="px-4 py-2">13/10/2025</td>
                            <td class="px-4 py-2">10:30</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded-full bg-yellow-200 text-yellow-800 text-sm font-semibold">
                                    Pendente
                                </span>
                            </td>
                            <td class="px-4 py-2 flex justify-center space-x-2">
                                <button class="px-3 py-1 bg-green-600 text-white text-sm rounded hover:bg-green-700">
                                    Confirmar
                                </button>
                                <button class="px-3 py-1 bg-yellow-500 text-white text-sm rounded hover:bg-yellow-600">
                                    Remarcar
                                </button>
                                <button class="px-3 py-1 bg-red-600 text-white text-sm rounded hover:bg-red-700">
                                    Cancelar
                                </button>
                            </td>
                        </tr>
                        <!-- Fim Exemplo -->
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>

<!-- Modal Nova Consulta -->
<div id="agendaModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6 relative">
        <button onclick="closeAgendaModal()" 
                class="absolute top-3 right-3 text-gray-500 hover:text-red-600 text-xl">
            &times;
        </button>
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Agendar Nova Consulta</h2>
        <form method="POST" action="">
            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Paciente:</label>
                <input type="text" name="paciente" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Doutor:</label>
                <select name="doutor" required
                        class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300">
                    <option value="">Selecione</option>
                    <option value="1">Dr. João</option>
                    <option value="2">Dra. Maria</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Data:</label>
                <input type="date" name="data" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300">
            </div>

            <div class="mb-4">
                <label class="block font-medium text-gray-700 mb-1">Hora:</label>
                <input type="time" name="hora" required
                       class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-green-300">
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeAgendaModal()"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                    Cancelar
                </button>
                <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Agendar
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    const agendaModal = document.getElementById('agendaModal');

    function openAgendaModal() {
        agendaModal.classList.remove('hidden');
        agendaModal.classList.add('flex');
    }

    function closeAgendaModal() {
        agendaModal.classList.add('hidden');
        agendaModal.classList.remove('flex');
    }
</script>

<?php include_once "../app/views/layout/footer.php"; ?>
