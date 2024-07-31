# README

Bem-vindo ao projeto!

## Descrição

Este projeto é uma aplicação CRUD construída usando PHP PDO, ainda em produção.
Foco desse projeto é o aprendizado da logica por traz do backend do PHP, com auxilio de documentações,videos e IA como Chat GPT e Copilot

## Instalação

1. Clone o repositório na pasta htdocs do xampp.
2. Abra o mysql.
3. Crie uma base de dados com nome 'crud'.
4. execute está query para criação dos clientes.
CREATE TABLE `crud`.`clients` ( `id` INT NOT NULL, `nome` VARCHAR(140) NOT NULL, `email` VARCHAR(140) NOT NULL, `telefone` VARCHAR(15) NOT NULL, `cpf` VARCHAR(14) NOT NULL, PRIMARY KEY (`id`));
4. execute está outra query para criação dos usuarios.
CREATE TABLE `crud`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(140) NOT NULL , `senha` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`));
5. Inicie o servidor e acesse a aplicação em seu navegador.


## Uso

1. Use a interface fornecida para criar, ler, atualizar e excluir registros no banco de dados.

## Futuras atualizações:

1. Adicionar uma tela onde você pode criar ordens de serviço e usar os clientes ja cadastrados.

## Avisos:

1. A opção criar usuario deve ser usada apenas uma vez, nesse projeto, como apenas uma empresa vai ter acesso ao DB, certo era deixar apenas um login,
porém deixei a opção la para testes. 

