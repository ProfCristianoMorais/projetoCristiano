<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $senha = $_POST['senha'];
    $perfil = $_POST['perfil'];

    // Criptografar a senha
    $senha_hash = password_hash($senha, PASSWORD_BCRYPT);

    // Inserir no banco de dados
    $sql = 'INSERT INTO usuarios (username, senha, perfil) VALUES (:username, :senha, :perfil)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'senha' => $senha_hash, 'perfil' => $perfil]);

    echo 'Usuário registrado com sucesso!';
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Registrar</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Nome de Usuário</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <div class="form-group">
            <label for="perfil">Perfil</label>
            <select class="form-control" id="perfil" name="perfil" required>
                <option value="administrador">Administrador</option>
                <option value="cliente">Cliente</option>
                <option value="professor">Professor</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Registrar</button>
    </form>
</div>
</body>
</html>
