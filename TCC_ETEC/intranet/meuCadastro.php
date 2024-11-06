<?php require('sec.php') ?>
<?php require('controleAcesso.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CondMind</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/cadastro.css">

    <script src="../src/javascript.js"></script>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../jquery/jquery.mask.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <div class="msg"></div>

    <?php include('../intranet/barraSuperiorInt.php'); ?>
    <div class="barraLateral">
        <?php include('../intranet/barraLateral.php'); ?>
    </div>
    <?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo "<p class=alert>$_SESSION[msg]</p>";
        unset($_SESSION['msg']);
    }
    ?>
    <?php
    $usuarioLogin = $_GET['cpf'];
    require('../acoes/connect.php');
    $busca = mysqli_query($con, "Select * from `tb_morador` where `cpf` = '$usuarioLogin'");
    $buscaCodigoUsuarioLogado = mysqli_query($con, "Select * from `tb_usuarios` where `usuario` = '$usuarioLogin'");
    $UsuarioLogado = mysqli_fetch_array($buscaCodigoUsuarioLogado);
    $morador = mysqli_fetch_array($busca);
    ?>
    <div class="aaaa mt-2 container text-center">
        <div class="row ">
            <div class="col">
                <!--  primeira coluna -->
                <div class="imglogo">
                    <label>
                        <h1>Meu Cadastro</h1>
                    <div class="imagemPromocional">
                        <img src="../imagens/timido.png" alt="" srcset="">
                    </div>
                    </label>
                </div>
            </div>
            <div class="cadastro col md-1">
                <!--Segunda coluna -->


                <form class="row g-3 " action="../acoes/meuCadastro.act.php" method="post" id="" enctype="multipart/form-data">
                    <div class="d-flex-column">
                        <div>
                            <input type="hidden" name="cod_morador" value="<?php echo $morador['cod_morador'] ?>">
                            <input type="hidden" name="foto_anterior" value="<?php echo $morador['foto'] ?>">
                            <img src="<?php echo $morador['foto']; ?>" class="imgUsuario" srcset="">
                            <p><input type="file" name="imagem" id="fileFoto"> </p>
                        </div>
                        <input type="hidden" name="codMorador" value="<?php echo $morador['cod_morador'] ?>">
                        <label for=""> Codigo Contato: <?php echo $morador['cod_morador']; ?></label>
                    </div>
                    <div class="col-md-4">
                        <label for="primeironome" class="form-label">Primeiro nome</label>
                        <input type="primeironome" name="primeiro_nome" class="form-control" id="primeironome" value="<?php echo $morador['primeiro_nome']; ?>">
                    </div>
                    <div class="col-md-8">
                        <label for="nomecompleto" class="form-label">Nome Completo</label>
                        <input type="nomecompleto" name="nome_completo" class="form-control" id="nomecompleto" value="<?php echo $morador['nome_completo']; ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="nomecompleto" class="form-label">E-mail</label>
                        <input type="nomecompleto" name="email" class="form-control" id="email" value="<?php echo $morador['email']; ?>">
                    </div>
                    <div class="col-4">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="cpf form-control" id="cpf" name="cpf" <?php echo "$campo"; ?> value="<?php echo $morador['cpf']; ?>">
                    </div>
                    <div class="col-4">
                        <label for="rg" class="form-label">RG</label>
                        <input type="text" class="form-control" name="rg" id="rg" value="<?php echo $morador['rg']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="dtnascimento" class="form-label">Data de Nascimento</label>
                        <input type="text" class="form-control" name="dtnascimento" id="dtnascimento" value="<?php echo $morador['dtnascimento']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" name="celular" id="celular" value="<?php echo $morador['celular']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="estadocivil" class=" form-label">Estado Civil</label>
                        <select id="estadocivil" name="estadocivil" class="form-select">
                            <option><?php echo $morador['estadocivil']; ?></option>
                            <option>Solteiro(a)</option>
                            <option>Casado(a)</option>
                            <option>Viuvo(a)</option>
                            <option>Divorciado(a)</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Bloco</label>
                        <input type="text" class="form-control" name="bloco" id="inputZip" <?php echo "$campo"; ?> value="<?php echo $morador['bloco']; ?>">
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Nº AP</label>
                        <input type="text" class="form-control" name="numero_apartamento" id="inputZip" <?php echo "$campo"; ?> value="<?php echo $morador['numero_apartamento']; ?> ">
                    </div>
                    <div class="col-12 ">
                        <button type="submit" class="mt-4 p-2 px-5 btn btn-primary">Alterar Meus Dados</button>
                    </div>
                </form>
                <div class="col-12 ">
                <button class="alterarSenha mt-4 p-2 px-5 btn btn-primary">
                    <?php echo " <a href =alterarUsuario.php?cod=$UsuarioLogado[cod_usuario]>Alterar Senha</a>"; ?>
                </button>
                <button onclick="cancelarIntra()" class="mt-4 p-2 px-5 btn btn-primary">Cancelar</button>
                </div>
            </div>

        </div>
    </div>


</body>

</html>

<script>

var $j = jQuery.noConflict();
 //Use jQuery com a variavel $j para evitar conflitos
 $j(document).ready(function(){
 $j('#cpf').mask("00000000000"); 
 $j('#rg').mask("0000000000"); 
 $j('#celular').mask("(00) 00000-0000");

 //onde #telefone é o id do campo

 });
</script>


