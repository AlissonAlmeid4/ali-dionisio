<?php require('sec.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CondMind</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> -->
    <!-- <script src="src/jquery-3.6.0.min.js"></script>
        <script src="src/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script> -->

    <script src="../src/javascript.js"></script>

    <link rel="stylesheet" href="../estilo/cadastro.css">
    <link rel="stylesheet" href="../estilo/cadUsuario.css">

</head>

<body>

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
    $codUsuario = $_GET['cod'];
    require('../acoes/connect.php');
    $busca = mysqli_query($con, "Select * from `tb_usuarios` where `cod_usuario` = '$codUsuario'");
    $usuario = mysqli_fetch_array($busca);
    ?>
    <div class="mt-5 container text-center">
        <div class="row ">
            <div class="col">
                <!--  primeira coluna -->

                <div class="imagemPromocional">
                    <h1>Alterar Senha</h1>
                    <img src="../imagens/timido.png" alt="" srcset="">
                </div>
            </div>
            <div class="cadastro cad222 col mt-3">
                <!--Segunda coluna -->
                <h5 class="card-title"></h5>

                <form class="mt-5 form-row g-3" action="../acoes/alterarUsuario.act.php" method="post" id="">
                    <div class="col-md-4">
                        <label class="form-label"> Codigo Usuário <?php echo $usuario['cod_usuario']; ?></label>
                        <input type="text" name="codUsuario" class="form-control" value="<?php echo $usuario['cod_usuario'] ?>" disabled="">
                        <input type="hidden" name="codUsuario" class="form-control" value="<?php echo $usuario['cod_usuario'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="usuario" class="form-label">Usuario (CPF)</label>
                        <input type="text" class="form-control" id="usuario" value="<?php echo $usuario['usuario']; ?> " disabled="">
                    </div>
                    <div class="col-md-4">
                        <label for="primeiro_nome" class="form-label">Primeiro Nome</label>
                        <input type="text" name="primeiro_nome1" class="form-control" id="primeiro_nome" value="<?php echo $usuario['primeiro_nome']; ?>" disabled="">
                    </div>
                    <div class="col-md-4">
                        <label for="senha" class="form-label">senha</label>
                        <input type="text" name="senha" class="form-control" id="senha" value="<?php echo $usuario['senha']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="estadocivil" class="form-label">Função</label>
                        <select type="text" id="funcao" class="form-control" disabled="">
                            <option><?php echo $usuario['funcao']; ?></option>

                        </select>
                    </div>
                    <div class="col-12 ">
                        <button type="submit" class="mt-4 p-2 px-5 btn btn-primary">Alterar Senha</button>
                    </div>

                </form>
                <button onclick="cancelarUsuario()" class="mt-4 p-2 px-5 btn btn-primary">Cancelar</button>
            </div>
        </div>


</body>

</html>