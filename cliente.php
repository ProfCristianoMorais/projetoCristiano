<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if (!isset($_SESSION['username']) || $_SESSION['perfil'] != 'administrador') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cliente</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Bem-vindo, Cliente!</h2>
    <!-- Conteúdo do cliente aqui -->
    <form action="logout.php" method="post">
        <button type="submit" class="btn btn-danger mt-3">Sair</button>
    </form>
</div>
</body>
</html>
