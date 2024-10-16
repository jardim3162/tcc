<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body id="cadastrarsenha">
    <div class="container-cadastro">
        <h1>Cadastre seu Usuário</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo '<div class="msg">' . $_SESSION['msg'] . '</div>';
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="cadastrar.php">
            <input type="text" name="nome" placeholder="Nome" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <input type="submit" value="Enviar">
        </form>
        <a class="back-link" href="Login.php">Voltar</a>
    </div>
</body>

</html>