<?php require('sec.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CondMind</title>
    <script src="../src/javascript.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script> -->
    <!-- <script src="src/jquery-3.6.0.min.js"></script>
        <script src="src/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script> -->
    <script src="../jquery/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="../estilo/minhaVaga.css">
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



        $codMorador = $_GET['cod'];
        require('../acoes/connect.php');
    }
    ?>
    <div class="mt-5 container text-center">
        <div class="row ">
            <div class="col">
                <!--  primeira coluna -->
                <div class="imglogo">
                    <label>
                        <h1>Cadastrar Vaga</h1>
                        <div class="imagemPromocional">
                            <img src="../imagens/timido.png" alt="" srcset="">
                        </div>

                    </label>
                </div>
            </div>
            <div class="cadastro col mt-3">
                <!--Segunda coluna -->

                <form class=" mt-5 row g-3 " action="../acoes/cadVaga.act.php" method="post" enctype="multipart/form-data">

                    <div class="col-md-4">
                        <!-- <label for="cod_vaga" class="form-label">Código Proprietário</label> -->
                        <input type="hidden" name="cod_vaga" class="form-control" id="cod_vaga">
                    </div>


                    <hr>
                    <div class="col-md-4">
                        <label for="num_vaga" class="form-label">Número da Vaga</label>
                        <select type="text" id="num_vaga" name="num_vaga" class="form-select2">
                            <option value="">Selecione um número</option>
                            <?php
                            for ($i = 1; $i <= 100; $i++) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>>
                        </select>
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="tipo_vaga" class="form-label">Tipo de Vaga</label>
                        <select type="text" id="tipo_vaga" name="tipo_vaga" class="form-select2">
                            <option value="">Selecione o tipo de veículo</option>
                            <option>Carro</option>
                            <option>Moto</option>
                        </select>
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="ocupada " class="form-label">Código do Usuário</label>
                        <!-- <input type="number" name="ocupada" class="form-control" id="ocupada"> -->

                        <select type="number" name="ocupada" class="form-select2" id="ocupada">

                            <?php
                            $sql = "SELECT * FROM tb_usuarios";
                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=$row[cod_usuario]> <br> Cod.: " .  $row["cod_usuario"] . " - Nome: " . $row["primeiro_nome"] . "<br> </option>";
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="placaveiculo" class="form-label">Placa do Veículo</label>
                        <select type="text" name="placa_veiculo" class="form-select2" id="placaveiculo">

                            <?php
                            $sql = "SELECT * FROM tb_veiculo_morador";
                            $result = $con->query($sql);

                            $sqlMorador = "SELECT * FROM tb_morador m
                            join tb_veiculo_morador vm on vm.cod_morador = m.cod_morador
                            WHERE vm.cod_morador = m.cod_morador";

                            $resultMorador = $con->query($sqlMorador);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    while ($row1 = $resultMorador->fetch_assoc()) {
                                        echo "<option value=$row1[placa_veiculo]> <br> Placa.: " .  $row1["placa_veiculo"] . " - Proprietario: "
                                            . $row1["primeiro_nome"] .
                                            "<br> </option>";
                                    }
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div>
                    <hr>
                    <div class="col-12 ">
                        <button type="submit" class="btn-enviar">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>