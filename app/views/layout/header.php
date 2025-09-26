<?php require_once "../app/config/config.php"; ?>
<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLogged = isset($_SESSION['user']);
$user = $isLogged ? $_SESSION['user'] : null;

// Define variáveis auxiliares
$userName = $isLogged && isset($user['nome']) ? $user['nome'] : "Usuário";
?>
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
<body class="bg-gray-100 text-gray-800 overflow-x-hidden">

<!-- Topbar -->
<header class="w-full fixed top-0 left-0 bg-gradient-to-r from-green-700 via-green-800 to-green-900 shadow-md z-50 transition-transform duration-300">
  <div class="flex justify-between items-center px-6 py-3">
    <!-- Logo -->
    <a href="<?= BASE_URL ?>" class="text-2xl font-extrabold tracking-wide text-white">
      Xtrier
    </a>

    <!-- Ações do Usuário -->
    <div class="flex items-center gap-4">
      <!-- Notificações -->
      <button class="relative p-2 rounded-full hover:bg-green-700 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 17h5l-1.405-1.405M19.5 12A7.5 7.5 0 1112 4.5 7.5 7.5 0 0119.5 12z"/>
        </svg>
        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-red-600 rounded-full"></span>
      </button>

      <!-- Nome do Usuário -->
      <span class="hidden sm:block font-medium text-white">
        <?= htmlspecialchars($userName) ?>
      </span>

      <!-- Botão Logout -->
      <a href="<?= BASE_URL ?>/auth/logout" 
         class="px-4 py-2 bg-red-600 text-white font-medium rounded-lg shadow hover:bg-red-700 transition">
        Sair
      </a>
    </div>
  </div>
</header>
