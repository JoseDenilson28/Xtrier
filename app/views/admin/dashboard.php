<?php include_once "../app/views/layout/header.php"; ?>
<div class="p-6">
    <h1 class="text-2xl font-bold">Painel do Admin</h1>
    <p>Bem-vindo, <?php echo $user['nome'] ?? 'admin'; ?>!</p>

    <ul class="mt-4">
        <li><a href="#">Gerenciar usuários</a></li>
        <li><a href="#">Configurações</a></li>
        <li><a href="/Xtrier/public/auth/logout">Sair</a></li>
    </ul>
</div>
<?php include_once "../app/views/layout/footer.php"; ?>
