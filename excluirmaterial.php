<?php
require_once "conexao.php";
$conexao = conectar();

$id_material = $_GET['id_material'];

$sql = "DELETE FROM material WHERE id_material=$id_material";
$result = mysqli_query($conexao, $sql);
if ($result) {
    header("Location: Telainicial.php");
} else {
    echo mysqli_errno($conexao) . ": " . mysqli_error($conexao);
}