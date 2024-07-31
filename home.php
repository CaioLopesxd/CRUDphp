<?php
require "config.php";
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/home.css">
    <title>Página Inicial</title>
</head>
<body>
    <div class="home-container">
        <button>
            <a href="listaDeClientes.php">Lista de Clientes</a>
        </button>
        <button>
            <a href="cadastroCliente.php">Cadastrar Cliente</a>
        </button>
        <button>
            <a href="sair.php">Sair</a>
        </button>
    </div>
</body>
</html>

