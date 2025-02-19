<?php
session_start();
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
</head>

<body id="cadastrarsenha">
    <div class="container-cadastro">
        <!-- topend, topstart , topmiddle -->
        <?php if (isset($_SESSION['cadastro_sucess']) && $_SESSION['cadastro_sucess'] == true) { ?>
            <script>
                Swal.fire({
                    position: "top-middle",
                    icon: "success",
                    title: "Cadastro efetuado com sucesso!",
                    showConfirmButton: false,
                    timer: 1500,
                    customClass: {
                        popup: 'small-popup'
                    }
                });
            </script>
            <?php
            unset($_SESSION['cadastro_sucess']);
            ?>
        <?php } ?>

        <h1>Cadastre seu Usuário</h1>

        <!-- Exibir a mensagem de erro se existir -->
        <?php if (isset($_SESSION['msg'])): ?>
            <div class="error-message">
                <?php echo $_SESSION['msg']; ?>
            </div>
            <?php unset($_SESSION['msg']); ?>
        <?php endif; ?>

        <form method="POST" action="cadastrar.php">
            <input type="text" name="nome" placeholder="Nome" required><br>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="senha" placeholder="Senha" required><br>
            <input type="password" name="confirmar_senha" placeholder="Confirmar Senha" required><br>
            <input type="submit" value="Enviar">
        </form>
        <a class="back-link" href="Login.php">Voltar</a>
    </div>
</body>

</html>
