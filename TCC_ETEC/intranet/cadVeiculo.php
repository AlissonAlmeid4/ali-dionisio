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

                <form class=" mt-5 row g-3 " action="../acoes/cadVeiculo.act.php" method="post" id="">

                    <div class="col-md-4">

                        <label for="placa_veiculo" class="form-label">Placa do Veículo</label>
                        <input type="text" name="placa_veiculo" class="form-select2">

                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="tipo_veiculo" class="form-label">Tipo do Veículo</label>
                        <select type="text" name="tipo_veiculo" class="form-select2">
                            <option>Selecione o tipo de veículo</option>
                            <option>Carro</option>
                            <option>Moto</option>
                        </select>
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="modelo" class="form-label">Modelo do Veículo</label>

                        <select type="text" name="modelo" class="form-select2">
                            <option select></option>

                            <?php
                            $sql = "SELECT * FROM tb_veiculo";
                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=$row[modelo_veiculo]> <br> Cod.: " .  $row["cod_veiculo"] . " - Modelo: " . $row["modelo_veiculo"] . "<br> </option>";
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="ano" class="form-label">Ano do Veículo</label>
                        <select type="text" name="ano" class="form-select2">
                            <option>Selecione um ano</option>
                            <?php
                            for ($i = 2023; $i >= 1950; $i--) {
                                echo "<option value='$i'>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <hr>
                    <div class="col-md-4">
                        <label for="cor" class="form-label">Cor do Veículo</label>
                        <select type="text" name="cor" class="form-select2" ">
                         <option select></option>

                            <?php
                            $sql = "SELECT * FROM tb_cor";
                            $result = $con->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value=$row[descricao_cor]> <br> Cod.: " .  $row["cod_cor"] . " - Cor: " . $row["descricao_cor"] . "<br> </option>";
                                }
                            } else {
                                echo "0 results";
                            }

                            ?>
                        </select>
                    </div>
                    <hr>
                    <div class=" col-md-4">
                            <label for="cod_morador" class="form-label">Código Proprietário</label>
                            <!-- <input type="text" name="cod_morador" class="form-control"> -->
                            <select type="text" name="cod_morador" class="form-select2">
                                <option select></option>

                                <?php
                                $sql = "SELECT * FROM tb_morador";
                                $result = $con->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value=$row[cod_morador]> <br> Cod.: " .  $row["cod_morador"] . " - Nome: " . $row["primeiro_nome"] . "<br> </option>";
                                    }
                                } else {
                                    echo "0 results";
                                }

                                ?>
                            </select>
                    </div>
                    <hr>
                    <div class=" col-12 ">
                        <button type=" submit" class="btn-enviar">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>