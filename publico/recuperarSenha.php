<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="../estilo/esqueciMinhaSenha.css">
    <script src="./src/javascript.js"></script>

</head>

<body>
    <?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo "<p class=alert> $_SESSION[msg]</p>";
        unset($_SESSION['msg']);
    }
    ?>
    <div class="mensagemLogin">
        <p>
        <h1>Seja Bem-Vindo</h1>
        <h2>Esqueceu sua senha? Podemos te ajudar </h2>
        </p>
    </div>
    <div class="logo">
        <a href="../publico/login.php">
            <img src="../imagens/shannonLogo.png" alt="logo">
        </a>
    </div>
    <div class="login">
   Codigo<input type="codigo" name="" id="">
    </div>
</body>

</html>