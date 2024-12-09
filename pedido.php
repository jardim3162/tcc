<?php
require_once "conexao.php";
$conexao = conectar();

// Receber os dados enviados via POST
$vet1 = $_POST['id_material'];
$vet2 = $_POST['quantidade'];
var_dump($vet1);
var_dump($vet2);

// Verificar se os dados são arrays
if (is_array($vet1) && is_array($vet2)) {
    foreach ($vet1 as $index => $id_material) {
        $quantidade = $vet2[$index] ?? null; // Obter quantidade correspondente

        // Validar os dados recebidos
        $id_material = mysqli_real_escape_string($conexao, $id_material);
        $quantidade = mysqli_real_escape_string($conexao, $quantidade);

        if ($quantidade !== null) {
            // Inserir os dados no banco
            $sql = "INSERT INTO pedido (id_material, quantidade) VALUES ('$id_material', '$quantidade')";
            $result = mysqli_query($conexao, $sql);

            if (!$result) {
                echo "Erro ao inserir no banco: " . mysqli_error($conexao);
                break; // Parar em caso de erro
            }
        } else {
            echo "Erro: Quantidade não encontrada para o material $id_material.<br>";
        }
    }
    echo "Dados inseridos com sucesso!";
} else {
    echo "Os dados enviados não são válidos.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Pedidos</title>
</head>

<body>
  <?php
  //ESTA IMPRIMINDO NA TELA SOMENTE O ID DO PRIMEIRO E O ULTIMO MATERIAL DA TABELA, ARRUMAR
  // var_dump($vetor1);
  // var_dump($vetor2);
  ?><br>
  <a href="Telainicialusuario.php">Voltar</a>
</body>

</html>