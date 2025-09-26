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
            <a href="#servicos" class="hover:text-green-300 transition">Serviços</a>
            <a href="#casos" class="hover:text-green-300 transition">Galeria de Sucessos</a>
            <a href="#doutores" class="hover:text-green-300 transition">Doutores</a>
            <a href="#contactos" class="hover:text-green-300 transition">Contactos</a>
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
    <div id="menu-mobile" class="fixed top-0 right-0 h-full w-3/4 max-w-xs backdrop-blur-md bg-green-800/70 transform translate-x-full transition-transform duration-300 shadow-2xl z-40">
        <nav class="flex flex-col mt-20 space-y-4 font-medium text-white px-6 pb-6 backdrop-blur-md bg-green-800/70">
            <a href="#servicos" class="hover:text-green-300 transition">Serviços</a>
            <a href="#casos" class="hover:text-green-300 transition">Galeria de Sucessos</a>
            <a href="#doutores" class="hover:text-green-300 transition">Doutores</a>
            <a href="#contactos" class="hover:text-green-300 transition">Contactos</a>
            <a href="<?= BASE_URL ?>/home/faq" class="hover:text-green-300 transition">FAQ</a>
            <a href="<?= BASE_URL ?>/auth/login" class="mt-6 block px-4 py-2 bg-white text-green-800 rounded-lg shadow hover:bg-gray-100 transition text-center font-semibold">
                Entrar
            </a>
        </nav>
    </div>
</header>


