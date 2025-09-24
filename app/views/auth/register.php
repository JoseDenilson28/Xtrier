<?php require_once "../app/views/layout/header.php"; ?>

<div class="min-h-screen flex items-center justify-center p-4 relative">
  <!-- Background Image -->
  <div class="absolute inset-0">
    <img src="<?= ASSETS_PATH ?>/img/bg-auth.jpg" 
         alt="Fundo registro" 
         class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-green-900/50 backdrop-blur-sm"></div>
  </div>

  <!-- Card do formulário -->
  <div class="relative bg-white/20 backdrop-blur-md shadow-2xl rounded-2xl max-w-md w-full p-8">
    <h2 class="text-3xl font-extrabold text-white mb-6 text-center">Registro</h2>
    
    <form method="POST" action="" class="space-y-4 text-white">
      <div>
        <label class="block font-medium mb-1">Nome:</label>
        <input type="text" name="nome" required
               class="w-full px-4 py-2 border border-white/50 rounded-lg bg-white/10 placeholder-white/70 text-white focus:ring-2 focus:ring-green-400 focus:outline-none transition">
      </div>

      <div>
        <label class="block font-medium mb-1">Email:</label>
        <input type="email" name="email" required
               class="w-full px-4 py-2 border border-white/50 rounded-lg bg-white/10 placeholder-white/70 text-white focus:ring-2 focus:ring-green-400 focus:outline-none transition">
      </div>

      <div>
        <label class="block font-medium mb-1">Senha:</label>
        <input type="password" name="senha" required
               class="w-full px-4 py-2 border border-white/50 rounded-lg bg-white/10 placeholder-white/70 text-white focus:ring-2 focus:ring-green-400 focus:outline-none transition">
      </div>

      <button type="submit" 
              class="w-full bg-green-700/80 hover:bg-green-800/90 text-white font-semibold py-2 rounded-lg shadow transition transform hover:-translate-y-1">
        Registrar
      </button>
    </form>

    <p class="mt-4 text-center text-white/80">
      Já tem conta? 
      <a href="<?= BASE_URL ?>/auth/login" class="text-green-700 font-semibold hover:underline">Login</a>
    </p>
  </div>
</div>

