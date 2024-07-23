<?php
    require "config.php";
    
    $lista = [];
    $sql = $pdo->query("SELECT * FROM clients");
    if($sql->rowCount() > 0){
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="styles/listaDeClientes.css">
</head>
<body>
    <div class="container">
        <h1>Lista de clientes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista as $cliente): ?>
                    <tr>
                        <td><?=$cliente['id'];?></td>
                        <td><?=$cliente['nome'];?></td>
                        <td><?=$cliente['email'];?></td>
                        <td><?=$cliente['telefone'];?></td>
                        <td><?=$cliente['cpf'];?></td>
                        <td>
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$cliente['id'];?>">
                            Editar
                        </button>
                            <button type="button" class="btn btn-danger delete-btn" data-id="<?=$cliente['id'];?>">
                                Excluir
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="telaCadastro.php" class="btn btn-success mt-3">Cadastro</a>
    </div>
    <?php foreach($lista as $client): ?>
    <div class="modal fade" id="exampleModal<?=$client['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cliente - <?=$client['nome'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="editarCliente.php" method="POST">
                        <div class="form-group">
                            <label for="id">Id:</label>
                            <input type="hidden" class="form-control" id="id" name="id" value="<?=$client['id'];?>" readonly>
                        </div>

                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?=$client['nome'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?=$client['email'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?=$client['telefone'];?>" required oninput="handleInput(event)">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$client['cpf'];?>" oninput="handleInput(event)">
                        </div>
                        <br>
                        <div class="modalButtonContainer">
                            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<script src="scripts/validate.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var id = $(this).data('id');
            if (confirm('Deseja realmente excluir este cliente?')) {
                window.location.href = 'delete.php?id=' + id;
            }
        });
    });
</script>
</body>
</html>
