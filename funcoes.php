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

//funcionamento do form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($_POST['pedidos'] as $pedido) {
      $id_usuario = $_SESSION['id_usuario'];
      $id_material = $pedido['id_material'];
      $nome_material = $pedido['nome'];
      $quantidade = (int) $pedido['quantidade'];


      if ($quantidade > 0) {

          $sql = "INSERT INTO pedido (quantidade, id_usuario, id_material, nome_material) 
                  VALUES ('$quantidade', '$id_usuario', '$id_material', '$nome_material')";
          $result = mysqli_query($conexao, $sql);
          if (!$result) {
              echo "Erro ao salvar pedido: " . mysqli_error($conexao);
          }
        }
      }
    }
?>