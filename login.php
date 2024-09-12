<?php
require 'db.php';
session_start();

// Redirecionar usuários autenticados para suas páginas de perfil
if (isset($_SESSION['username'])) {
    if ($_SESSION['perfil'] == 'administrador') {
        header('Location: administracao.html');
    } elseif ($_SESSION['perfil'] == 'cliente') {
        header('Location: cliente.php');
    } elseif ($_SESSION['perfil'] == 'professor') {
        header('Location: professor.html');
    }
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $senha = $_POST['senha'];

    // Consultar o usuário
    $sql = 'SELECT senha, perfil FROM usuarios WHERE username = :username';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['username'] = $username;
        $_SESSION['perfil'] = $usuario['perfil'];

        // Redirecionar para a página apropriada com base no perfil
        if ($usuario['perfil'] == 'administrador') {
            header('Location: administracao.html');
        } elseif ($usuario['perfil'] == 'cliente') {
            header('Location: cliente.php');
        } elseif ($usuario['perfil'] == 'professor') {
            header('Location: professor.html');
        }
        exit();
    } else {
        echo 'Nome de usuário ou senha incorretos!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Login</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Nome de Usuário</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>
</body>
</html>
