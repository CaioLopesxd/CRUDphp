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
    echo "<script>
            alert('cpf!');
            window.location.href = 'telaCadastro.php';
         </script>";
    exit();
}

if ($emailStmt->rowCount() > 0) {
    echo "
   <script>
            alert('Email já cadastrado!');
            window.location.href = 'telaCadastro.php';
    </script>
    ";
    exit();
}

$sql = $pdo->prepare("INSERT INTO clients (nome, email, telefone, cpf) VALUES (:nome, :email, :telefone, :cpf)");
$sql->bindValue(':nome', $nome);
$sql->bindValue(':email', $email);
$sql->bindValue(':telefone', $telefone);
$sql->bindValue(':cpf', $cpf);
$sql->execute();
header('Location: listaDeClientes.php');



