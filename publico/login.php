<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login CondMind</title>
    <link rel="stylesheet" href="../estilo/login.css">
    <script src="./src/javascript.js"></script>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../jquery/jquery.mask.js"></script>


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
    <div class="ladoCima">
        <h2>Login</h2>
    </div>
    <div class="lados">
        <div class="ladoEsquerdo">
            <h2>Login</H2>
        </div>
        <div class="ladoDireito">
            <div class="emCima">
                <form action="../acoes/login.act.php" method="post">
                    <p>Seja Bem-Vindo(a)
                    <p> Cadastre-se ou logue no sistema para comersarmos</p>
                    <nav>
                        <nav class="borda">
                            <p> USUÁRIO </p>
                            <input type="text" name="usuario" id="usuario" placeholder="   Digite o usuário">
                        </nav>
                        <nav class="borda">
                            <p> SENHA </p>
                            <input type="password" name="senha" id="senha" placeholder="   Digite a senha">
                        </nav>
                    </nav>
                    <nav class="esqueciSenha">
                        <a href="../publico/esqueciMinhaSenha.php">Esqueci Minha Senha ou Usuário</a>
                    </nav>
                    <p class="botoes">
                        <input type="submit" class="mt-4 p-2 px-5 btn btn-primary" id="enter" value="Entrar">
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
</body>

</html>
    
<script>
var $j = jQuery.noConflict();
 //Use jQuery com a variavel $j para evitar conflitos
 $j(document).ready(function(){
 $j('#usuario').mask("00000000000"); 

 //onde #telefone é o id do campo

 });
 </script>