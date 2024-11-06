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


    <link rel="stylesheet" href="../estilo/minhaVaga.css">
    <!-- <link rel="stylesheet" href="../estilo/bootstrap.min.css"> -->
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
    ?>
    <?php
    $cod_vaga = $_GET['cod'];
    require('../acoes/connect.php');
    $busca = mysqli_query($con, "Select * from `tb_vaga_garagem` where `cod_vaga` = '$cod_vaga'");
    $vaga = mysqli_fetch_array($busca);
    ?>

    <div class=" mt-5 container text-center">
        <div class="row ">
            <div class="cadastro col mt-3">
                <!--  primeira coluna -->
                <!-- <h5 class="card-title">Altere sua vaga</h5> -->
                <div class="imagemPromocional">
                    <h1>Altere sua vaga</h1>
                    <img src="../imagens/timido.png" alt="" srcset="">
                </div>
            </div>
            <div class="cadastro col mt-3">
                <!--Segunda coluna -->

                <form class="mt-5 row g-3" action="../acoes/alterarMinhaVaga.act.php" method="post" id="">
                    <div class="col-md-4">
                        <label for="cod_vaga" class="form-label">Código da Vaga</label>
                        <input type="number" name="cod_vaga" class="form-control" value="<?php echo $vaga['cod_vaga']; ?>">
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="num_vaga" class="form-label">Número da Vaga</label>
                        <input type="number" name="num_vaga" class="form-control" value="<?php echo $vaga['num_vaga']; ?>">
                        <input type="hidden" name="cod_vaga" class="form-control" value="<?php echo $vaga['cod_vaga']; ?>">
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="tipo_vaga" class="form-label">Tipo da Vaga</label>
                        <input type="text" name="tipo_vaga" class="form-control" value="<?php echo $vaga['tipo_vaga']; ?>">
                        <input type="hidden" name="cod_vaga" class="form-control" value="<?php echo $vaga['cod_vaga']; ?>">
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="ocupada" class="form-label">Ocupação da Vaga</label>
                        <input type="number" name="ocupada" class="form-control" value="<?php echo $vaga['ocupada']; ?>">
                        <input type="hidden" name="cod_vaga" class="form-control" value="<?php echo $vaga['cod_vaga']; ?>">
                        <?php
                        $ocupada = 1; // valor da célula da tabela

                        if ($ocupada == 1) {
                            echo "Vaga ocupada";
                        } else {
                            echo "Vaga disponível";
                        }
                        ?>
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="placa_veiculo" class="form-label">Placa do Veículo</label>
                        <input type="text" name="placa_veiculo" class="form-control" value="<?php echo $vaga['placa_veiculo']; ?>">
                        <input type="hidden" name="cod_vaga" class="form-control" value="<?php echo $vaga['cod_vaga']; ?>">
                    </div>

                    <div class="col-12 ">
                        <button type="submit" class="btn-enviar">Salvar</button>
                    </div>

                </form>
                <button onclick="cancelarVaga()" class="btn-cancel">Cancelar</button>
            </div>
        </div>


</body>
<script src="../src/javascript.js"></script>

</html>