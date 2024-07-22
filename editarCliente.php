<?php

require "config.php";

// Verifica se todos os campos foram enviados via POST
if (isset($_POST['cliente_id'], $_POST['edit_nome'], $_POST['edit_email'], $_POST['edit_telefone'], $_POST['edit_cpf'])) {
    
    $cliente_id = $_POST['cliente_id'];
    $nome = $_POST['edit_nome'];
    $email = $_POST['edit_email'];
    $telefone = $_POST['edit_telefone'];
    $cpf = $_POST['edit_cpf'];

    // Verifica se o CPF já está cadastrado para outro cliente
    $cpfStmt = $pdo->prepare("SELECT * FROM clients WHERE cpf = :cpf AND id <> :id");
    $cpfStmt->execute([':cpf' => $cpf, ':id' => $cliente_id]);


    // Atualiza os dados do cliente no banco de dados
    $sql = "UPDATE clients SET nome = :nome, email = :email, telefone = :telefone, cpf = :cpf WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':nome' => $nome,
        ':email' => $email,
        ':telefone' => $telefone,
        ':cpf' => $cpf,
        ':id' => $cliente_id
    ]);

    echo "
    <script>
        alert('Cliente atualizado com sucesso!');
        window.location.href = 'home.php';
    </script>";
    exit;
} else {
    // Se algum campo não foi enviado via POST, redireciona para a página inicial
    header('Location: home.php');
    exit;
}

?>
