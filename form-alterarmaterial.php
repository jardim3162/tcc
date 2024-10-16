<?php
$id_material = $_GET['id_material'];
require_once "conexao.php";
$conexao = conectar();
$sql = "SELECT * FROM material WHERE id_material = $id_material";
$result = mysqli_query($conexao, $sql);

if ($result) {
    $material = mysqli_fetch_assoc($result);
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
    die();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Alteração</title>
</head>

<body>
    <form action="alterarmaterial.php" method="post">
        <input type="hidden" name="id_material" value="<?= $material['id_material'] ?>"><br>
        Nome: <input type="text" name="nome" value="<?= $material['nome'] ?>"><br>
        Estoque: <input type="number" name="estoque" value="<?= $material['estoque'] ?>"><br>
        Descrição: <input type="text" name="descricao" value="<?= $material['descricao'] ?>"><br>
        <input type="submit" value="Salvar"><br>
    </form>
</body>

</html>