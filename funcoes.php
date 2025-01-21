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
$conexao = conectar();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($_POST['pedidos'] as $pedido) {
      $id_usuario = $_SESSION['id_usuario'];
      $nome_material = $pedido['nome'];
      $quantidade = (int) $pedido['quantidade'];

      if ($quantidade > 0 && $id_material > 0) {
          $sql = "INSERT INTO pedido (quantidade, id_usuario, nome_material) 
                  VALUES ('$quantidade', '$id_usuario', '$nome_material')";
          $result = mysqli_query($conexao, $sql);
          if (!$result) {
              echo "Erro ao salvar pedido: " . mysqli_error($conexao);
          }
      }
  }
}

///PESQUISAR DA PAGINA DAS PAGINAS
$termoPesquisa = isset($_GET['pesquisa']) ? trim($_GET['pesquisa']) : '';

if ($termoPesquisa) {
    $result = $conexao->prepare("SELECT * FROM material WHERE nome LIKE ? OR descricao LIKE ?");
    $procurarTerm = "%$termoPesquisa%";
    $result->bind_param("ss", $procurarTerm, $procurarTerm);
} else {
    $result = $conexao->prepare("SELECT * FROM material");
}

$result->execute();
$resultado = $result->get_result();
$materiais = $resultado->fetch_all(MYSQLI_ASSOC);
$result->close();

?>