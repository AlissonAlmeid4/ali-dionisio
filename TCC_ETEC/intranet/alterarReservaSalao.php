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
    $cod_salao = $_GET['cod'];
    require('../acoes/connect.php');
    $busca = mysqli_query($con, "Select * from `tb_salao` where `cod_salao` = '$cod_salao'");
    $salao = mysqli_fetch_array($busca);
    ?>
    
    <div class="mt-5 container text-center">
        <div class="row ">
            <div class="cadastro col mt-3">
                <!--  primeira coluna -->
                <!-- <h5 class="card-title">Altere sua reserva</h5> -->

            </div>
            <div class="cadastro col mt-3">
                <!--Segunda coluna -->
                <h5 class="card-title">Altere sua reserva</h5>

                <form class="mt-5 row g-3" action="../acoes/alterarReserva.act.php" method="post" id="">
                    <div class="col-md-4">
                        <label for="data_reserva" class="form-label">Data da reserva</label>
                        <input type="date" name="data_reserva" class="form-control" value="<?php echo $salao['data_reserva']; ?>">
                        <input type="hidden" name="cod_salao" class="form-control" value="<?php echo $salao['cod_salao']; ?>">

                    </div>

                    <div class="col-md-4">
                        <label for="hora-inicio" class="form-label">Hora Inicial</label>
                        <input type="time" name="hora_inicio" class="form-control" value="<?php echo $salao['hora_inicio']; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="hora_fim" class="form-label">Hora Final</label>
                        <input type="time" name="hora_fim" class="form-control" value="<?php echo $salao['hora_fim']; ?>">
                    </div>

                    <div class="col-12 ">
                        <button type="submit" class="mt-4 p-2 px-5 btn btn-primary">Alterar reserva</button>
                    </div>

                </form>
                <button onclick="cancelarSalao()" class="mt-4 p-2 px-5 btn btn-primary">Cancelar</button>
            </div>
        </div>


</body>

</html>