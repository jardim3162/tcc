<?session_destroy();?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body id="bodylogin">
    <div class="container-body">
        <div class="left-side">
        </div>
        <div class="right-side">
            <h1>Login</h1>
            <form action="testLogin.php" method="post">
                <input type="email" name="Email" placeholder="Email" required><br>
                <input type="password" name="Senha" placeholder="Senha" required><br>
                <button type="submit" name="submit">Entrar</button><br><br><br>
            </form>
            <a href="recuperar-senha/form-alterarsenha.php">Esqueceu a Senha?</a>
            <a href="CadastrarSenha.php">Cadastrar-se?</a>
        </div>
    </div>
</body>
</html>