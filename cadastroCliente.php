<?php

require "config.php";
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

$erro = "" ;

if(isset($_POST['nome']) && !empty($_POST['nome'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $cpfStmt = $pdo->prepare("SELECT * FROM clients WHERE cpf = :cpf");
    $emailStmt = $pdo->prepare("SELECT * FROM clients WHERE email = :email");

    $cpfStmt->execute([':cpf' => $cpf]);
    $emailStmt->execute([':email' => $email]);

    if ($cpfStmt->rowCount() > 0) {
        $erro = "cpf já cadastrado!";
    }else if ($emailStmt->rowCount() > 0) {
        $erro = "Email já cadastrado!";
    }else{
        $sql = $pdo->prepare("INSERT INTO clients (nome, email, telefone, cpf) VALUES (:nome, :email, :telefone, :cpf)");
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':telefone', $telefone);
        $sql->bindValue(':cpf', $cpf);
        $sql->execute();
        header('Location: listaDeClientes.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/cadastroCliente.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar cliente</h1>
        <form action="" method="POST">
            <label for="nome">Nome: </label>
            <input type="text" placeholder="Nome Sobrenome" name="nome" id="nome"required>
            <label for="email">Email: </label>
            <input type="email" placeholder="email@email.com" name="email" id="email" required>
            <label for="telefone">Telefone: </label>
            <input type="text" name="telefone" id="telefone" placeholder="(99) 99999-9999" oninput="handleInput(event)" required>
            <label for="cpf">CPF: </label>
            <input type="text" name="cpf" id="cpf" placeholder="999.999.999-99" oninput="handleInput(event)" required>
            <div id="btnDiv">
                <button type="submit" id="cad">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
    <div>
        <?php if (!empty($erro)): ?>
            <h1 class="error"><?php echo htmlspecialchars($erro); ?></h1>
        <?php endif; ?>
    </div>
    <div>
        <a href="listaDeCLientes.php">Voltar</a>
    </div>
    <script src="scripts/validate.js">
    </script> 
</body>
</html>
