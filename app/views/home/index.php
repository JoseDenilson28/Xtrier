<?php include '../app/views/layout/header_home.php'; ?>

<!-- Hero Section -->
<section class="relative min-h-[100vh] overflow-hidden">
  <!-- Background Image + Overlay -->
  <div class="absolute inset-0">
    <img src="<?= ASSETS_PATH ?>/img/hero.png" 
         alt="Dentista atendendo paciente" 
         class="w-full h-full object-cover filter brightness-75">
    <div class="absolute inset-0 bg-gradient-to-b from-green-900/60 to-green-800/40"></div>
  </div>

  <!-- Conteúdo Hero -->
  <div class="relative container mx-auto flex flex-col md:flex-row items-center justify-between px-6 py-32">
    <div class="md:w-1/2 text-center md:text-left space-y-6 text-white">
      <h1 class="text-5xl md:text-6xl font-extrabold leading-tight drop-shadow-lg">
        Bem-vindo ao Sistema Xtrier <span class="text-yellow-400">🦷</span>
      </h1>
      <p class="text-lg md:text-xl max-w-lg drop-shadow-md">
        Triagem moderna, atendimento de excelência. Cuide do seu sorriso conosco!
      </p>
      <a href="<?= BASE_URL ?>/auth/login" 
         class="mt-6 inline-block px-8 py-4 bg-white text-green-700 rounded-xl shadow-lg hover:shadow-2xl hover:scale-105 transition-transform font-semibold">
        Entrar
      </a>
    </div>
  </div>
</section>

<!-- Serviços Cards -->
<section id="servicos" class="py-24 bg-gray-50">
  <div class="container mx-auto text-center">
    <h2 class="text-4xl md:text-5xl font-bold text-green-800 mb-6">
      Nossos Serviços
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12">
      Tratamentos modernos para cuidar da sua saúde bucal com qualidade e confiança.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
      <!-- Card Exemplo -->
      <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col h-full p-6 transform hover:scale-105">
        <img src="<?= ASSETS_PATH ?>/img/servicos/clareamento.png" 
             alt="Limpeza e Clareamento"
             class="h-40 w-full object-contain rounded-xl bg-gray-100 mb-4">
        <h3 class="text-xl font-semibold mb-2 text-green-700 flex items-center justify-center gap-2">
          Limpeza e Clareamento <span>🦷</span>
        </h3>
        <p class="text-gray-600 text-sm flex-grow">
          Remove manchas e placa, devolvendo brilho e saúde ao sorriso.
        </p>
      </div>

      <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col h-full p-6 transform hover:scale-105">
        <img src="<?= ASSETS_PATH ?>/img/servicos/restauracao.png" 
             alt="Restaurações"
             class="h-40 w-full object-contain rounded-xl bg-gray-100 mb-4">
        <h3 class="text-xl font-semibold mb-2 text-green-700 flex items-center justify-center gap-2">
          Restaurações <span>🔧</span>
        </h3>
        <p class="text-gray-600 text-sm flex-grow">
          Repara dentes danificados, devolvendo a função e estética.
        </p>
      </div>

      <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col h-full p-6 transform hover:scale-105">
        <img src="<?= ASSETS_PATH ?>/img/servicos/ortodontia.png" 
             alt="Ortodontia"
             class="h-40 w-full object-contain rounded-xl bg-gray-100 mb-4">
        <h3 class="text-xl font-semibold mb-2 text-green-700 flex items-center justify-center gap-2">
          Ortodontia <span>😁</span>
        </h3>
        <p class="text-gray-600 text-sm flex-grow">
          Corrige o alinhamento dos dentes e melhora a mordida com aparelhos modernos.
        </p>
      </div>

      <div class="bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-lg hover:shadow-2xl transition flex flex-col h-full p-6 transform hover:scale-105">
        <img src="<?= ASSETS_PATH ?>/img/servicos/implante.png" 
             alt="Implantes Dentários"
             class="h-40 w-full object-contain rounded-xl bg-gray-100 mb-4">
        <h3 class="text-xl font-semibold mb-2 text-green-700 flex items-center justify-center gap-2">
          Implantes Dentários <span>🦷</span>
        </h3>
        <p class="text-gray-600 text-sm flex-grow">
          Substituem dentes perdidos com solução estética, resistente e duradoura.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Casos de Sucesso -->
<section id="casos" class="py-24 bg-gradient-to-b from-green-800/90 to-green-600/80 relative overflow-hidden">
  <div class="container mx-auto text-center">
    <h3 class="text-4xl font-bold text-white mb-6">Galeria de Sucessos</h3>
    <p class="text-green-100 mb-12 max-w-2xl mx-auto">
      Resultados de pacientes atendidos com excelência e confiança.
    </p>

    <div class="swiper mySwiper max-w-5xl mx-auto pb-24">
      <div class="swiper-wrapper">
        <?php 
        $cases = [
          ['img' => 'clareamento.jpg', 'title' => 'Clareamento Dental'],
          ['img' => 'implante.jpg', 'title' => 'Implante Dentário'],
          ['img' => 'ortodontia.jpg', 'title' => 'Ortodontia'],
          ['img' => 'restauracao.jpg', 'title' => 'Restauração Dentária'],
        ];
        foreach($cases as $case): ?>
          <div class="swiper-slide transform hover:scale-105 transition">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
              <img src="<?= ASSETS_PATH ?>/img/casos/<?= $case['img'] ?>" 
                   alt="<?= $case['title'] ?>" 
                   class="w-full h-64 object-cover">
              <p class="mt-4 text-green-800 font-semibold text-lg p-4"><?= $case['title'] ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination mt-8"></div>
    </div>
  </div>
</section>

<!-- Doutores -->
<section id="doutores" class="py-28 bg-gradient-to-r from-green-50 via-green-100 to-green-50 relative overflow-hidden">
  <div class="container mx-auto text-center relative z-10">
    <h2 class="text-4xl md:text-5xl font-extrabold text-green-800 mb-6">Conheça nossos Doutores</h2>
    <p class="text-gray-700 max-w-3xl mx-auto mb-12 text-lg">
      Profissionais experientes e dedicados para cuidar do seu sorriso com excelência.
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
      <?php 
      $doctors = [
        ['img'=>'F1.jpg','name'=>'Dra. Ana Silva','spec'=>'Ortodontia'],
        ['img'=>'M2.jpg','name'=>'Dr. Carlos Pereira','spec'=>'Implantodontia'],
        ['img'=>'F2.jpg','name'=>'Dra. Mariana Costa','spec'=>'Endodontia'],
        ['img'=>'M1.jpg','name'=>'Dr. Lucas Mendes','spec'=>'Periodontia'],
      ];
      foreach($doctors as $doc): ?>
        <div class="bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center transform hover:scale-105 transition">
          <img src="<?= ASSETS_PATH ?>/img/doutores/<?= $doc['img'] ?>" 
               alt="<?= $doc['name'] ?>" 
               class="w-40 h-40 object-cover rounded-full mb-6 border-4 border-green-700">
          <h3 class="text-2xl font-bold text-green-700 mb-1"><?= $doc['name'] ?></h3>
          <p class="text-gray-600 mb-4"><?= $doc['spec'] ?></p>
          <a href="#agendar" class="px-6 py-2 bg-green-700 text-white rounded-full font-semibold hover:bg-green-800 transition">
            Agendar Consulta
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Feedback -->
<section id="feedback" class="py-20 bg-white">
  <div class="container mx-auto text-center">
    <h2 class="text-4xl font-bold text-green-800 mb-6">O que nossos pacientes dizem</h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12">
      Veja depoimentos de pacientes satisfeitos com nossos serviços.
    </p>

    <div class="max-w-4xl mx-auto space-y-8">
      <?php 
      $feedbacks = [
        ['text'=>'Excelente atendimento! A equipe é muito profissional e atenciosa. Recomendo a todos.','name'=>'João M.'],
        ['text'=>'Fiz um clareamento dental e fiquei impressionada com o resultado. Meu sorriso nunca esteve tão bonito!','name'=>'Maria S.'],
        ['text'=>'Os doutores são muito competentes e explicam tudo com calma. Me senti muito segura durante o tratamento.','name'=>'Ana P.'],
      ];
      foreach($feedbacks as $fb): ?>
        <div class="bg-green-50 p-6 rounded-2xl shadow-lg">
          <p class="text-gray-700 italic mb-4">&ldquo;<?= $fb['text'] ?>&rdquo;</p>
          <h3 class="text-green-800 font-semibold"><?= $fb['name'] ?></h3>
        </div>
      <?php endforeach; ?>
    </div>

    <a href="#contactos" class="mt-10 inline-block px-6 py-3 bg-green-700 text-white rounded-lg shadow hover:bg-green-800 transition font-medium">
      Envie seu depoimento
    </a>
  </div>
</section>

<!-- Contactos -->
<section id="contactos" class="py-20 bg-gray-50">
  <div class="container mx-auto text-center">
    <h2 class="text-4xl font-bold text-green-800 mb-6">Fale Conosco</h2>
    <p class="text-gray-600 max-w-2xl mx-auto mb-12">
      Estamos aqui para ajudar! Entre em contato para agendar uma consulta ou tirar dúvidas.
    </p>

    <div class="flex flex-col md:flex-row justify-center items-center space-y-6 md:space-y-0 md:space-x-12">
      <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-lg hover:shadow-lg transition">
        <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        <span class="text-lg text-gray-700">+244 923 456 789</span>
      </div>

      <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-lg hover:shadow-lg transition">
        <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 12v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2m12-2l4-4m0 0l-4-4m4 4H4"/></svg>
        <span class="text-lg text-gray-700">contato@xtrier.com</span>
      </div>

      <div class="flex items-center space-x-4 p-4 bg-green-50 rounded-lg hover:shadow-lg transition">
        <svg class="w-8 h-8 text-green-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M3 12h18M3 21h18"/></svg>
        <span class="text-lg text-gray-700">Rua Exemplo, 123 - Cidade</span>
      </div>
    </div>
  </div>
</section>

<?php include '../app/views/layout/footer_home.php'; ?>
