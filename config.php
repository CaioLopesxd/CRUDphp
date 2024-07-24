<?php
    $db_name = 'crud';
    $db_host = 'localhost:3306';
    $db_user = 'root';
    $db_password = '';
    
    try {
        $pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
    } catch (PDOException $e) {
        echo 'Erro: '.$e->getMessage();
    }