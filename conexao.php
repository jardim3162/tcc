<?php
function conectar()
{
    $conexao = mysqli_connect("localhost", "root", "", "tcc");
    if ($conexao == false) {
        die("Erro ao conectar a base de dados! " .
            mysqli_connect_errno() . ": " .
            mysqli_connect_error());
    }

    return $conexao;
}
function executarSQL($conexao, $sql)
{
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado === false) {
        echo "Erro ao executar o comando SQL. " .
            mysqli_errno($conexao) . ": " . mysqli_error($conexao);
        die();
    }
    return $resultado;
}