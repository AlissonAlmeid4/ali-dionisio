<?php require('sec.php') ?>

<!DOCTYPE html>
<html lang="pt-br">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/salao.css">
    
    <script src="../src/javascript.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <title>Salão</title>

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

    $codUsuario = $_SESSION['usuarioLogin'];
    require('../acoes/connect.php');
    $busca = mysqli_query($con, "Select * from `tb_morador` where `cpf` = '$codUsuario'");
    $morador = mysqli_fetch_array($busca);
    ?>
    <?php echo    "<div class=$controleMorador>";   ?>
    <button type="button" onclick="consuhisto()" id="consuhisto" class="mt-4 p-2 px-5 btn btn-primary">Consultar Histórico</button>
    <?php  echo  "</div>";  ?>
    <div class="titSalao">
        <div class="esquerda">
            <h2>Agende o seu horário, <?php echo " $_SESSION[nome] "; ?> </h2><br>
        </div>
        <div class="direita">
            <p> Em nosso Salão de festas você pode curtir todas as atrações.</p>
        </div>
    </div>


    <div id="quadro">
        <div id="state">
            <?php include('../intranet/containner.php'); ?>
        </div>
    </div>
    <div class="disposicaoDate">
        <h2>Marque abaixo a data e o horario de inicio e termino do seu evento</h2>
        <form class="form mt-2 row g-3" action="../acoes/salao.act.php" method="post" id="formulario">

            <div class="marcaEvento">
                <div class="dataHora1">
                    <p> Data do evento: </p>
                    <?php
                    date_default_timezone_set('America/Sao_Paulo');
                    $hoje = date('Y-m-d');

                    
                    $hora = date('H:i');
                    $horaNova = strtotime("$hora + 30 minutes");
                    $hora = date("H:i", $horaNova);
                    // echo $hora;       
                    echo    "<input type=date name=Calendario id=data min=$hoje value=$hoje> ";
                    ?>
                </div>
                <div class="dataHora2">
                    <p> Horário de Inicio</p>
                    <?php
                    $hora = "00:00";
                    /*   echo     "   <label for=hora-cons>Escolha o horário da consulta (aberto das 12:00 às 18:00): </label>";*/
                    echo     "    <input name=horaInicio id=horaInicio type=time";
                    echo     "          min=$hora onclick=jogaDataFim() required value=$hora>";
                    echo     "   <span class=validacao></span>";
                    $horaEscolhida = $hora;

                    $horaNova2 = strtotime("$horaEscolhida + 30 minutes");
                    $horaMostrar = date("H:i", $horaNova2);
                    "<input type=time name=horaInicio id=horaInicio min=$horaMostrar value=$horaMostrar>";
                    ?>
                </div>
                <div class="dataHora2">
                    <p> Horário de Termino </p>
                    <!-- <nav id="exibir" class="exibir"></nav> -->
                    <?php
                    echo     "    <input type=time name=horaFim id=horaTermino min=$hora value=$hora >";

                    echo     "   <input type=hidden name=cod_morador class=form-control value=$morador[cod_morador]> ";
                    ?>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="mt-4 p-2 px-5 btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
    <div class="salaoLista">

        <?php include('../intranet/salaoLista.php'); ?>
    </div>
    <script src="../src/javascript.js"></script>

</body>

</html>