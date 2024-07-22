# README

Bem-vindo ao projeto!

## Descrição

Este projeto é uma aplicação CRUD construída usando PHP PDO, ainda em produção.

## Instalação

1. Clone o repositório na pasta htdocs do xampp.
2. Abra o mysql.
3. Crie uma base de dados com nome 'crud'.
4. Crie uma tabela com nome de 'clients'
5. execute está query.
CREATE TABLE `crud`.`clients` (
  `id` INT NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  PRIMARY KEY (`id`));
6. Inicie o servidor e acesse a aplicação em seu navegador.

## Uso

1. Use a interface fornecida para criar, ler, atualizar e excluir registros no banco de dados.

## Futuras atualizações:

1. Sistema de login.
2. Correção do sistema de verificação de dados.

