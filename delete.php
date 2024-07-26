<?php
require "config.php";

$id = FILTER_INPUT(INPUT_GET, 'id');

if($id){
    $sql = $pdo->prepare("DELETE FROM clients WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();
}
header('Location: listaDeClientes.php');

