<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$quantidade = $_POST['quantidade'];
$materi= $_POST['id_material'];
//ESTA IMPRIMINDO NA TELA SOMENTE O ID DO PRIMEIRO E O ULTIMO MATERIAL DA TABELA, ARRUMAR
echo "Os pedidos foram : $materi, $quantidade";

?><br>
<a href="Telainicial.php">Voltar</a>    
</body>
</html>
