<?php require('sec.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../estilo/salao.css">
    <script src="../src/javascript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    
</head>
<body>
<div class="barraLateral">
        <?php include('../intranet/barraLateral.php'); ?>
</div>
<?php include('../intranet/barraSuperiorInt.php'); ?>

<h1 class="titEventos">Historico de Eventos</h1>
<?php
@session_start();
if (isset($_SESSION['msg'])) {
    echo "<p class=alert> $_SESSION[msg]</p>";
    unset($_SESSION['msg']);
    $_SESSION['usuarioLogin'] = $usuario;
}
require('../acoes/connect.php');

$salaos = mysqli_query($con, "SELECT * FROM `tb_hist_salao` WHERE `DATA_RESERVA`  order by data_reserva ");
echo "<table class='table table-hover table-bordered'>";
echo "<tr class=tittabela>";
echo "<th class=tittabela>Cod.</th>";
echo "<th class=tittabela>Cod_Salão</th>";
echo "<th class=tittabela>Data do Evento</th>";
echo "<th class=tittabela>Horario de inicio</th>";
echo "<th class=tittabela>Horario do fim</th>";
echo "<th class=tittabela>Nome do morador</th>";
echo "</tr >";
while ($salao = mysqli_fetch_array($salaos)) {
    $moradores = mysqli_query($con, "Select * from `tb_morador` where cod_morador = $salao[cod_morador]");
    echo "<tr>";
    echo "<td><strong>Cod.</strong> $salao[num_hist_salao]  </td>";
    echo "<td><strong>Cod. Salão</strong> $salao[cod_salao]  </td>";
    echo "<td><strong>Data Evento</strong> $salao[data_reserva] </td>";
    echo "<td><strong>Hora Inicio</strong> $salao[hora_inicio] </td>";
    echo "<td><strong>Hora Fim</strong> $salao[hora_fim] </td>";
    while ($morador = mysqli_fetch_array($moradores)) {
        $nome = strtoupper("$morador[nome_completo]");
        $verificador = $salao['cod_morador'];
        echo "<td><strong>Morador</strong> $nome </td>";
    }
}
echo "</tr>";

echo "</table>";
?>

</body>
</html>