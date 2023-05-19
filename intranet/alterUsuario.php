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
    <link rel="stylesheet" href="../estilo/cadastro.css">
    <link rel="stylesheet" href="../estilo/cadUsuario.css">

</head>

<body>
    <?php include('sidebar.php'); ?>

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
            <div class="col"> <!--  primeira coluna -->
                <div class="imglogo">
                    <img src="../imagens/ShannonLogo.png" class="d-flex w-2 h-10" alt="...">
                </div>
            </div>
            <div class="cadastro col mt-3"> <!--Segunda coluna -->
                <h5 class="card-title">Cadastre-se</h5>

                <form class="form mt-2 row g-3" action="../acoes/cadUsuario.act.php" method="post" id="">
                    <div class="col-md-4">
                        <input type="hidden" name="codUsuario" value="<?php echo $usuario['cod_usuario'] ?>">
                        Codigo Contato <?php echo $usuario['cod_usuario']; ?>


                        <label for="usuario" class="form-label">usuario</label>
                        <input type="text" name="usuario" class="form-control" id="usuario" value="<?php echo $usuario['usuario']; ?>">

                        <label for="senha" class="form-label">senha</label>
                        <input type="text" name="senha" class="form-control" id="senha" value="<?php echo $usuario['senha']; ?>">

                        <label for="funcao" class="form-label">funcao</label>
                        <input type="text" class="form-control" name="funcao" id="funcao" value="<?php echo $usuario['funcao']; ?>">
                    </div>
                    <div class="col-12 ">
                        <button type="submit" class="mt-4 p-2 px-5 btn btn-primary">Cadastrar</button>
                    </div>
                </form>
                <button onclick="cancelarIntra()" class="mt-4 p-2 px-5 btn btn-primary">Cancelar</button>
            </div>
        </div>
    </div>

</body>

</html>