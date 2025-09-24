<?php include_once "../app/views/layout/header.php"; ?>
<div class="p-6">
    <h1 class="text-2xl font-bold">Painel do Paciente</h1>
    <p>Bem-vindo, <?php echo $_SESSION['user_id']; ?>!</p>

    <ul class="mt-4">
        <li><a href="#">Agendar consulta</a></li>
        <li><a href="#">Histórico</a></li>
        <li><a href="/Xtrier/public/auth/logout">Sair</a></li>
    </ul>
</div>
<?php include_once "../app/views/layout/footer.php"; ?>
