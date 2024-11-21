<?php
//Telainicialusuario.php
$conexao = conectar();
if (!isset($_SESSION['Email'])) {
  header('Location: Login.php');
  exit();
}
$sql = "SELECT * FROM material";
$result = mysqli_query(mysql: $conexao, query: $sql);
if ($result) {
  $materiais = mysqli_fetch_all(result: $result, mode: MYSQLI_ASSOC);
} else {
  echo mysqli_errno(mysql: $conexao) . ": " . mysqli_error($conexao);
}

//fim

//Telainicial.php
$conexao = conectar();
if (!isset($_SESSION['Email'])) {
  header('Location: Login.php');
  exit();
}

$sql = "SELECT * FROM material";
$result = mysqli_query(mysql: $conexao, query: $sql);
if ($result) {
  $materiais = mysqli_fetch_all(result: $result, mode: MYSQLI_ASSOC);
} else {
  echo mysqli_errno(mysql: $conexao) . ": " . mysqli_error($conexao);
}
//fim
