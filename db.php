<?php
$dsn = 'mysql:host=localhost;dbname=sistema_login';
$username = 'root'; // Substitua pelo seu usuário do MySQL
$password = ''; // Substitua pela sua senha do MySQL

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Falha na conexão: ' . $e->getMessage();
}
?>
