<?php
session_start();
require_once "conexao.php";
$conexao = conectar();
$sql = "SELECT * FROM pedido";
$result = $conexao->query(query: $sql);


?>