<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Recuperação de Senha</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px 30px;
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 30px;
            color: #4CAF50;
        }

        p {
            font-size: 25px;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            margin-bottom: 10px;
            font-size: 20px;
        }

        input[type="email"] {
            width: 96%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 20px; /* Reduzi o tamanho */
            border: none;
            border-radius: 4px;
            font-size: 17px; /* Reduzi o tamanho da fonte */
            cursor: pointer;
            text-align: center;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }

        footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Recuperar Senha</h1>
        <p>Digite o seu email para criar uma nova senha. Um email será enviado com um link de recuperação.</p>
        <form action="recuperar.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" value="Enviar email de recuperação"><br>
            <a class="back-link" href="../Login.php">Voltar</a>
        </form>
        <footer>© 2024 Sua Empresa</footer>
    </div>
</body>

</html>
