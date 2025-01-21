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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulário de Alteração</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .msg {
            color: green;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 95%;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
        .btn-block{
            display: block;
            width: 95%;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="alterarmaterial.php" method="post">
            <h1>Alterar Material</h1>
            <input type="hidden" name="id_material" value="<?= $material['id_material'] ?>"><br>
            Nome: <input type="text" name="nome" value="<?= $material['nome'] ?>"><br>
            Estoque: <input type="number" name="estoque" value="<?= $material['estoque'] ?>"><br>
            Descrição: <input type="text" name="descricao" value="<?= $material['descricao'] ?>"><br>
            <input type="submit" value="Salvar"><br>
            <a href="Telainicial.php" class="btn btn-secondary btn-block">Cancelar</a>
        </form>
    </div>
</body>

</html>
