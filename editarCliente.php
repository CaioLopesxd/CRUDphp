<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require "config.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];

   
    $sql = "UPDATE clients SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf WHERE id = :id";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':telefone', $telefone);
    $stmt->bindParam(':cpf', $cpf);
    
   
    if ($stmt->execute()) {

        header('Location: listaDeClientes.php');
        exit();
    } else {
      
        echo "Erro ao tentar atualizar o cliente.";
    }
    
} else {

    echo "Método não permitido.";
}
?>
