<?php

require "config.php";

$nome = $_POST['nome']; 
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cpf = $_POST['cpf'];

$cpfStmt = $pdo->prepare("SELECT * FROM clients WHERE cpf = :cpf");
$emailStmt = $pdo->prepare("SELECT * FROM clients WHERE email = :email");

$cpfStmt->execute([':cpf' => $cpf]);
$emailStmt->execute([':email' => $email]);

if ($cpfStmt->rowCount() > 0) {
    echo "
    <script>
        alert('CPF já cadastrado!');
        window.location.href = 'telaCadastro.php';
    </script>
    ";
    exit;
}

if ($emailStmt->rowCount() > 0) {
    echo "
    <script>
        const debug = document.getElementById('debug');
        window.location.href = 'telaCadastro.php';
    </script>
    ";
    exit;
}

function addDatabase($pdo, $nome, $email, $telefone, $cpf) {
    $sql = $pdo->prepare("INSERT INTO clients (nome, email, telefone, cpf) VALUES (:nome, :email, :telefone, :cpf)");
    $sql->bindValue(':nome', $nome);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':telefone', $telefone);
    $sql->bindValue(':cpf', $cpf);
    $sql->execute();
    echo "
    <script>
        alert('Cadastro realizado com sucesso!');
        window.location.href = 'home.php';
    </script>
    ";
}

addDatabase($pdo, $nome, $email, $telefone, $cpf);
?>
