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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
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
                            <button  type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?=$cliente['id'];?>">
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

    <!-- Modais para cada cliente -->
    <?php foreach($lista as $cliente): ?>
    <div class="modal fade" id="exampleModal<?=$cliente['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Cliente - <?=$cliente['nome'];?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulário para editar informações -->
                    <form action="editarCliente.php" method="POST">
                        <input type="hidden" name="cliente_id" value="<?=$cliente['id'];?>">
                        <div class="form-group">
                            <label for="edit_nome">Nome:</label>
                            <input type="text" class="form-control" id="edit_nome" name="edit_nome" value="<?=$cliente['nome'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_email">Email:</label>
                            <input type="email" class="form-control" id="edit_email" name="edit_email" value="<?=$cliente['email'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_telefone">Telefone:</label>
                            <input type="text" class="form-control" id="edit_telefone" name="edit_telefone" value="<?=$cliente['telefone'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_cpf">CPF:</label>
                            <input type="text" class="form-control" id="edit_cpf" name="edit_cpf" value="<?=$cliente['cpf'];?>" required>
                        </div>
                        <!-- Botão para submeter o formulário -->
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    
    
    <script>
       $(document).ready(function() {
    $('.delete-btn').click(function() {
        var cliente_id = $(this).data('id');
        if (confirm('Deseja realmente excluir este cliente?')) {
            // Aqui você pode adicionar a lógica para enviar a solicitação de exclusão para o servidor
            window.location.href = 'delete.php?id=' + cliente_id;
            // alert('Cliente excluído com sucesso!'); // Comentado para não confundir com o redirecionamento imediato
        }
    });
});

    </script>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
