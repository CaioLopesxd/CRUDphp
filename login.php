<?php
session_start();

require "config.php";

$erro = '';

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $hashStmt = $pdo->prepare("SELECT senha FROM users WHERE email = :email");
    $hashStmt->bindValue(':email', $email);
    $hashStmt->execute();

    if ($hashStmt->rowCount() > 0) {
        $hashData = $hashStmt->fetch(PDO::FETCH_ASSOC);
        $hashedPassword = $hashData['senha'];

        if (password_verify($senha, $hashedPassword)) {
            $infoStmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
            $infoStmt->bindValue(':email', $email);
            $infoStmt->execute();

            if ($infoStmt->rowCount() > 0) {
                $info = $infoStmt->fetch(PDO::FETCH_ASSOC);
                header("Location: listaDeClientes.php");
                $_SESSION['id'] = $info['id'];
                exit();
            } else {
                $erro = "Ocorreu um erro ao buscar informações do usuário.";
            }
        } else {
            $erro = "Email e/ou senha incorretos!";
        }
    } else {
        $erro = "Email e/ou senha incorretos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form class="login-form" action="" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>
            <button type="submit">Entrar</button>
            <?php if (!empty($erro)): ?>
                <h1 class="error"><?php echo htmlspecialchars($erro); ?></h1>
            <?php endif; ?>
        </form>
        <div class="link">
            <a href="listaDeClientes.php">Esqueci minha senha</a>
            <a href="cadastro.php">Cadastre-se</a>
        </div>
    </div>
</body>

</html>