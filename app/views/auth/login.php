<?php require_once "../app/views/layout/header.php"; ?>

<div class="min-h-screen flex items-center justify-center p-4 relative">
  <!-- Background Image -->
  <div class="absolute inset-0">
    <img src="<?= ASSETS_PATH ?>/img/bg-auth.jpg" 
         alt="Fundo login" 
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-green-900/50 backdrop-blur-sm"></div>
  </div>

  <!-- Botão de voltar -->
  <a href="<?= BASE_URL ?>" 
     class="absolute top-6 left-6 flex items-center space-x-2 px-4 py-2 bg-white/30 text-white rounded-lg backdrop-blur-md hover:bg-white/50 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    <span class="font-medium">Voltar</span>
  </a>

  <!-- Card do formulário -->
  <div class="relative bg-white/20 backdrop-blur-md shadow-2xl rounded-2xl max-w-md w-full p-8">
    <h2 class="text-3xl font-extrabold text-white mb-6 text-center">Login</h2>
    
    <form method="POST" action="" class="space-y-4 text-white">
      <!-- Email -->
      <div>
        <label class="block font-medium mb-1">Email:</label>
        <input type="email" name="email" required
               class="w-full px-4 py-2 border border-white/50 rounded-lg bg-white/10 placeholder-white/70 text-white focus:ring-2 focus:ring-green-400 focus:outline-none transition">
      </div>

      <!-- Senha -->
      <div>
        <label class="block font-medium mb-1">Senha:</label>
        <input type="password" name="senha" required
               class="w-full px-4 py-2 border border-white/50 rounded-lg bg-white/10 placeholder-white/70 text-white focus:ring-2 focus:ring-green-400 focus:outline-none transition">
      </div>

      <!-- Botão Entrar -->
      <button type="submit" 
              class="w-full bg-green-700/80 hover:bg-green-800/90 text-white font-semibold py-2 rounded-lg shadow transition transform hover:-translate-y-1">
        Entrar
      </button>
    </form>

    <p class="mt-4 text-center text-white/80">
      Ainda não tem conta? 
      <a href="<?= BASE_URL ?>/auth/register" class="text-green-700 font-semibold hover:underline">Registrar</a>
    </p>
  </div>
</div>
