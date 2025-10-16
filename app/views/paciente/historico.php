<?php include_once "../app/views/layout/header.php"; ?>

<div class="flex min-h-screen bg-gray-100 pt-16">
    <!-- Sidebar -->
    <?php include_once "../app/views/layout/sidebar_paciente.php"; ?>
    <!-- Conteúdo Principal -->
    <main class="flex-1 p-8">
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
                <h1 class="text-3xl font-extrabold text-gray-9000 tracking-tight">Histórico de Triagem</h1>
                <p class="text-gray-600">Aqui você pode visualizar o histórico de triagens realizadas.</p>
            </div>
        </div>

       <!-- Histórico de Triagens -->
       <div class=" grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mt-8">
            <!-- Card 1 - Triagem Exemplo -->
            <div class="bg-white rounded-2xl shadow p-4 border border-gray-200 flex flex-col gap-1 hover:shadow-lg transition">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-lg font-bold text-gray-800">Triagem - 20/10/2025</h2>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Concluída</span>
                </div>  
                <div class="text-sm text-gray-600 mb-2">
                    <strong>Sintomas:</strong> Dor intensa, Sangramento
                </div>
                <p class="text-gray-500 text-sm">
                    Histórico: Paciente relatou dor intensa na região molar inferior direita após um pequeno trauma. Observou sangramento leve.
                </p>
            </div>
       </div>   
    </main>
</div>
        