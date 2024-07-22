<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Clientes</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, width=device-width">
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
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        label {
            width: 100%;
            margin: 10px 0;
        }
        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        #cad{
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        #btnDiv{
            display: flex;
            justify-content: center;
        }
    </style>
    <script>
        function formatTelefone(value) {
            value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
            return value.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
        }

        function formatCPF(value) {
            value = value.replace(/\D/g, ''); // Remove caracteres não numéricos
            if (value.length > 11) value = value.slice(0, 11); // Limita a 11 dígitos
            return value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
        }

        function isValidCPF(cpf) {
            cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

            if (cpf.length !== 11 || /^(\d)\1{10}$/.test(cpf)) {
                return false; // CPF com todos os dígitos iguais é inválido
            }

            let sum = 0;
            let remainder;

            // Verifica o primeiro dígito verificador
            for (let i = 0; i < 9; i++) {
                sum += parseInt(cpf.charAt(i)) * (10 - i);
            }

            remainder = sum % 11;
            if (remainder < 2) {
                remainder = 0;
            } else {
                remainder = 11 - remainder;
            }

            if (remainder !== parseInt(cpf.charAt(9))) {
                return false;
            }

            // Verifica o segundo dígito verificador
            sum = 0;
            for (let i = 0; i < 10; i++) {
                sum += parseInt(cpf.charAt(i)) * (11 - i);
            }

            remainder = sum % 11;
            if (remainder < 2) {
                remainder = 0;
            } else {
                remainder = 11 - remainder;
            }

            return remainder === parseInt(cpf.charAt(10));
        }

        function handleInput(event) {
            const input = event.target;
            if (input.id === 'telefone') {
                input.value = formatTelefone(input.value);
            } else if (input.id === 'cpf') {
                input.value = formatCPF(input.value);
            }
        }

        function validateForm(event) {
            event.preventDefault();

            // Obtém os valores dos campos
            const nome = document.getElementById('nome').value.trim();
            const email = document.getElementById('email').value.trim();
            const telefone = document.getElementById('telefone').value.trim();
            const cpf = document.getElementById('cpf').value.trim();

            // Valida o campo Nome
            if (nome === '') {
                alert('O campo Nome é obrigatório.');
                return;
            }

            // Valida o campo Email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('O Email deve ser válido.');
                return;
            }

            // Valida o campo Telefone
            const telefonePattern = /^\(\d{2}\) \d{5}-\d{4}$/;
            if (!telefonePattern.test(telefone)) {
                alert('O Telefone deve estar no formato (48) 99127-4997.');
                return;
            }

            // Valida o campo CPF
            const cpfPattern = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
            if (!cpfPattern.test(cpf)) {
                alert('O CPF deve estar no formato 999.999.999-99.');
                return;
            }

            if (!isValidCPF(cpf)) {
                alert('O CPF informado é inválido.');
                return;
            }
            // Se tudo estiver correto, envia o formulário
            document.querySelector('form').submit();
        }
    </script>
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
        <a href="home.php">Voltar</a>
    </div>
</body>
</html>
