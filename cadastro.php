<?php
require "config.php";

if(isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $sql = $pdo->prepare("INSERT INTO users (email, senha) VALUES (:email, :senha)");
    $sql->bindValue(':email', $email);
    $sql->bindValue(':senha', $senha);
    $sql->execute();
    header('Location: login.php');
}   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Document</title>
</head>
<body>
<div class="login-container">
        <h1>Registre-se</h1>
        <form class="login-form" action="" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>
            <button type="submit">Entrar</button>
        </form>
        <a href="login.php">Voltar</a>
    </div>
</body>
</html>