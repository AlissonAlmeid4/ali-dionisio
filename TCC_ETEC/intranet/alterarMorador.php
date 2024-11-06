<?php require('sec.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CondMind</title>

    <script src="../src/javascript.js"></script>

    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../jquery/jquery.mask.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> -->
    <!-- <script src="src/jquery-3.6.0.min.js"></script>
        <script src="src/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script> -->
    <link rel="stylesheet" href="../estilo/cadastro.css">
</head>

<body>
<div class="barraLateral">
        <?php include('../intranet/barraLateral.php'); ?>
    </div>
    <?php include('../intranet/barraSuperiorInt.php'); ?>

    <?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo "<p class=alert>$_SESSION[msg]</p>";
        unset($_SESSION['msg']);
    }

    $codMorador = $_GET['cod'];
    require('../acoes/connect.php');
    $busca = mysqli_query($con, "Select * from `tb_morador` where `cod_morador` = '$codMorador'");
    $morador = mysqli_fetch_array($busca);
    ?>
    <div class="mt-2 container text-center">
        <div class="row ">
            <div class="col">
                <!--  primeira coluna -->
                <div class="imglogo">
                    <div class="imagemPromocional">
                    <h1>Alterar usuário </h1>
                        <img src="../imagens/timido.png" alt="" srcset="">
                    </div>
                </div>
            </div>
            <div class="cadastro col mt-3">
                <!--Segunda coluna -->


                <form class=" mt-5 row g-3 " action="../acoes/alterarMorador.act.php" method="post" id="" enctype="multipart/form-data">
                    <div class="mx-auto">
                        <input type="hidden" name="foto_anterior" value="<?php echo $morador['foto'] ?>">
                        <input type="hidden" name="cod_morador" value="<?php echo $morador['cod_morador'] ?>">
                        <img src="<?php echo $morador['foto']; ?>" class="imgUsuario" srcset="">
                        <p><input type="file" name="imagem" id="fileFoto"> </p>
                    </div>

                    <div class="col-md-4">
                        <label for="primeironome" class="form-label">Nome</label>
                        <input type="text" name="primeiro_nome" value="<?php echo $morador['primeiro_nome'] ?>" class="form-control" id="primeironome">
                    </div>
                    <div class="col-md-8">
                        <label for="nomecompleto" class="form-label">Nome Completo</label>
                        <input type="text" name="nome_completo" value="<?php echo $morador['nome_completo'] ?>" class="form-control" id="nomecompleto">
                    </div>
                    <div class="col-md-8">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo $morador['email']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="estadocivil" class="form-label">Função</label>
                        <select type="text" id="funcao" name="funcao" class="form-select">
                            <option><?php echo $morador['funcao']; ?></option>
                            <option>Morador</option>
                            <option>Administrador</option>
                            <option>Porteiro</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="cpf form-control" id="cpf" name="cpf" value="<?php echo $morador['cpf'] ?>">
                    </div>
                    <div class="col-4">
                        <label for="rg" class="form-label">RG</label>
                        <input type="text" class="form-control" name="rg" id="rg" value="<?php echo $morador['rg'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="dtnascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dtnascimento" value="<?php echo $morador['dtnascimento'] ?>" id="dtnascimento">
                    </div>
                    <div class="col-md-4">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" name="celular" value="<?php echo $morador['celular'] ?>" id="celular">
                    </div>
                    <div class="col-md-4">
                        <label for="estadocivil" class="form-label">Estado Civil</label>
                        <select type="text" id="estadocivil" name="estadocivil" class="form-select">
                            <option><?php echo $morador['estadocivil']; ?></option>
                            <option>Solteiro(a)</option>
                            <option>Casado(a)</option>
                            <option>Viuvo(a)</option>
                            <option>Divorciado(a)</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Bloco</label>
                        <input type="number" class="form-control" name="bloco" value="<?php echo $morador['bloco'] ?>" id="inputZip">
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Nº AP</label>
                        <input type="number" class="form-control" name="numero_apartamento" value="<?php echo $morador['numero_apartamento'] ?>" id="inputZip">
                    </div>

                    <div class="col-12 ">
                        <button type="submit" class="mt-4 p-2 px-5 btn btn-primary">Alterar</button>
                </form>
            </div>
            <button onclick="cancelarMorador()" class="mt-4 p-2 px-5 btn btn-primary">Cancelar</button>
        </div>
    </div>
    </div>

</body>

</html>

<!--MASCARAS-->
    <script>
        var $j = jQuery.noConflict();
        // Use jQuery com a variavel $j para evitar conflitos
        $j(document).ready(function(){
        $j('#cpf').mask("00000000000");
        $j('#celular').mask("(11) 99999-9999");
        $j('#rg').mask("000000000");
            });
    </script>