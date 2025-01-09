<?php
session_start();
require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido alternativo</title>
</head>
<body>
    <form action="cadastroalternativo.php" method="POST">
    <h1>Formulario de requerimento de material alternativo</h1>
    Insira aqui o nome do material:<input type="text" name="nome">
    Descrição: <input type="text" name="descricao">
    Motivo: <input type="text" name="motivo">
    <input type="submit" value="Enviar">
    </form>
</body>
</html>