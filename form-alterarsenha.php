<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>digite aqui: </h1>
    <?php
    if (isset($_SESSION['msg'])) {
        echo ($_SESSION['msg']);
        unset($_SESSION['msg']);
    }
    ?>

    <form method="GET" action="alterarSenha.php">
        Nome: <input type="text" name="nome"><br><br>
        Email: <input type="email" name="email"><br><br>
        <a href="alterarSenha.php"><button>Enviar</button></a>
    </form>
</body>

</html>