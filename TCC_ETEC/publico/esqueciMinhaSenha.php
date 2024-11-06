<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="../estilo/esqueciMinhaSenha.css">
    <script src="./src/javascript.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo "<p class=alert> $_SESSION[msg]</p>";
        unset($_SESSION['msg']);
    }
    ?>

    <?php include('barraSuperiorPub.php'); ?>

    <div class="lados">
        <div class="ladoEsquerdo">
            <h2>Esqueceu a sua senha CondMind ?</H2>
        </div>
        <div class="ladoDireito">
            <div class="emCima">
                <form action="../acoes/esqueciMinhaSenha.act.php" method="post">
                    <p>Não se preocupe. Vamos ajudar você a recuperá-la. </p>
                    <p>Preencha o seu e-mail ou CPF cadastrado.</p>
                    <nav>
                        <nav class="borda">
                            <p> USUÁRIO </p>
                            <input type="text" name="cpf" id="cpf" placeholder="   Digite o seu CPF">
                        </nav>
                    </nav>
                    <p class="botoes">
                        <input type="submit" class="mt-4 p-2 px-5 btn btn-primary" id="esqueciMinhaSenha" value="Ir para a próxima etapa">
                    </p>
                </form>
            </div>
            <div class="emBaixo">
                <!-- <nav class="borda">
                    <strong>Não tem cadastro ?</strong>
                    <p>
                        É rápido e simples, basta informar alguns dados
                    </p>
                    <a href="../publico/esqueciMinhaSenha.php">Cadastre-se</a>
                    </nav> -->
            </div>
        </div>
    </div>

    <!-- <div class="mensagemLogin">
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
        <form action="../acoes/esqueciMinhaSenha.act.php" method="post">
            <h1>Recupere sua senha</h1>
            <p>Digite abaixo o seu CPF</p>
            <nav>
                <p>CPF: <input type="text" name="cpf" id="cpf"></p>
            </nav>
            <p class="botoes">
                <input type="submit" class="mt-4 p-2 px-5 btn btn-primary" id="esqueciMinhaSenha" value="Proximo Etapa">
            </p>
        </form>
    </div> -->
</body>

</html>