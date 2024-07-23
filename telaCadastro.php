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
        <form action="cadastroScript.php" method="POST" onsubmit="validateForm(event)">
            <label for="nome">Nome: </label>
            <input type="text" placeholder="Nome Sobrenome" name="nome" id="nome">
            <label for="email">Email: </label>
            <input type="email" placeholder="email@email.com" name="email" id="email">
            <label for="telefone">Telefone: </label>
            <input type="text" name="telefone" id="telefone" placeholder="(99) 99999-4997" oninput="handleInput(event)">
            <label for="cpf">CPF: </label>
            <input type="text" name="cpf" id="cpf" placeholder="999.999.999-99" oninput="handleInput(event)">
            <div id="btnDiv">
                <button type="submit" id="cad">
                    Cadastrar
                </button>
            </div>
        </form>
    </div>
    <div>
        <a href="listaDeCLientes.php">Voltar</a>
    </div>
    <script src="scripts/validate.js">
    </script> 
</body>
</html>
