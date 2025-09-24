<?php require_once "../app/config/config.php"; ?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="<?= ASSETS_PATH ?>/css/output.css">
    <link rel="stylesheet" href="<?= ASSETS_PATH ?>/css/style.css">
    <link rel="stylesheet" href="<?= ASSETS_PATH ?>/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="<?= ASSETS_PATH ?>/css/toastify.min.css">

    <!-- JS -->
    <script src="<?= ASSETS_PATH ?>/js/sweetalert2.min.js"></script>
    <script src="<?= ASSETS_PATH ?>/js/swiper-bundle.min.js"></script>
    <script src="<?= ASSETS_PATH ?>/js/toastify.min.js"></script>
    <script src="<?= ASSETS_PATH ?>/js/home/script.js"></script>
</head>
<body class="bg-gray-200 text-gray-800">

<!-- Header -->
<header class="fixed w-full z-50 backdrop-blur-md bg-green-800/70 shadow-lg transition-all duration-300">
    <div class="container mx-auto flex justify-between items-center p-4">
        <!-- Logo -->
        <a href="<?= BASE_URL ?>" class="text-2xl md:text-3xl font-extrabold tracking-wider text-white hover:text-green-200 transition">
            Xtrier
        </a>

        <!-- Menu Desktop -->
        <nav class="hidden md:flex items-center space-x-6 font-medium text-white">
            <a href="<?= BASE_URL ?>#servicos" class="hover:text-green-300 transition">Serviços</a>
            <a href="<?= BASE_URL ?>#casos" class="hover:text-green-300 transition">Galeria de Sucessos</a>
            <a href="<?= BASE_URL ?>#doutores" class="hover:text-green-300 transition">Doutores</a>
            <a href="<?= BASE_URL ?>#contactos" class="hover:text-green-300 transition">Contactos</a>
            <a href="<?= BASE_URL ?>/home/faq" class="hover:text-green-300 transition">FAQ</a>
            <a href="<?= BASE_URL ?>/auth/login" class="ml-6 px-5 py-2 bg-white text-green-800 font-semibold rounded-lg shadow-md hover:shadow-xl hover:bg-gray-100 transition transform hover:-translate-y-1">
                Entrar
            </a>
        </nav>

        <!-- Botão Hamburguer Mobile -->
        <button id="menu-btn" class="md:hidden flex items-center justify-center p-2 rounded-md border border-white text-white hover:bg-green-400/40 transition focus:outline-none">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round"
                 d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Menu Mobile -->
    <div id="menu-mobile" class="fixed top-0 right-0 h-full w-3/4 max-w-xs bg-green-900/95 backdrop-blur-md transform translate-x-full transition-transform duration-300 shadow-2xl z-40">
        <nav class="flex flex-col mt-20 space-y-4 font-medium text-white px-6">
            <a href="<?= BASE_URL ?>#servicos" class="hover:text-green-300 transition">Serviços</a>
            <a href="<?= BASE_URL ?>#casos" class="hover:text-green-300 transition">Galeria de Sucessos</a>
            <a href="<?= BASE_URL ?>#doutores" class="hover:text-green-300 transition">Doutores</a>
            <a href="<?= BASE_URL ?>#contactos" class="hover:text-green-300 transition">Contactos</a>
            <a href="<?= BASE_URL ?>/home/faq" class="hover:text-green-300 transition">FAQ</a>
            <a href="<?= BASE_URL ?>/auth/login" class="mt-6 block px-4 py-2 bg-white text-green-800 rounded-lg shadow hover:bg-gray-100 transition text-center font-semibold">
                Entrar
            </a>
        </nav>
    </div>
</header>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('menu-mobile');

    btn.addEventListener('click', () => {
        menu.classList.toggle('translate-x-full');
    });

    // Fechar menu ao clicar fora
    window.addEventListener('click', (e) => {
        if(!menu.contains(e.target) && !btn.contains(e.target)) {
            if(!menu.classList.contains('translate-x-full')) {
                menu.classList.add('translate-x-full');
            }
        }
    });
</script>



<!-- FAQ Section -->
<section class="container mx-auto px-4 py-26">
    <h2 class="text-3xl font-bold mb-8 text-center">Perguntas Frequentes (FAQ)</h2>
    <div class="space-y-6 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">O que é a Xtrier?</h3>
            <p class="text-gray-700">A Xtrier é uma plataforma que conecta pacientes com profissionais de saúde especializados em diversas áreas médicas.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Como posso marcar uma consulta?</h3>
            <p class="text-gray-700">Você pode marcar uma consulta navegando pelos perfis dos doutores, escolhendo o que melhor se adequa às suas necessidades e clicando no botão "Marcar Consulta".</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Quais são os métodos de pagamento aceitos?</h3>
            <p class="text-gray-700">Aceitamos diversos métodos de pagamento, incluindo cartões de crédito, débito e pagamentos via plataformas digitais como PayPal.</p>
        </div>  
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Como posso cancelar ou reagendar uma consulta?</h3>
            <p class="text-gray-700">Você pode cancelar ou reagendar uma consulta acessando sua conta, indo até a seção de consultas agendadas e selecionando a opção desejada.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Meus dados estão seguros na Xtrier?</h3>
            <p class="text-gray-700">Sim, levamos a privacidade e segurança dos seus dados muito a sério. Utilizamos tecnologias avançadas para proteger suas informações pessoais e médicas.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Posso deixar uma avaliação para o doutor após a consulta?</h3>
            <p class="text-gray-700">Sim, após a consulta você terá a oportunidade de avaliar o doutor e deixar um comentário sobre sua experiência.</p>
        </div>
    </div>
</section>
<?php include '../app/views/layout/footer.php'; ?>