<style>
    .mensagemData {
        display: flex;
        justify-content: center;
        border: 2px solid black;
        margin-left: 15rem;
        margin-right: 15rem;
        margin-top: 15rem;
    }
</style>
<?php
require('../acoes/connect.php');
extract($_POST);
extract($_FILES);

//var_dump($_POST);

strtotime($Calendario . " " . $horaInicio);
"<br>";
strtotime($Calendario . " " . $horaFim);



if ($horaInicio < $horaFim) {
    if (mysqli_query($con, "INSERT INTO `tb_salao` (`cod_salao`,
                                                `data_reserva`,
                                                `hora_inicio`,
                                                `hora_fim`,
                                                `cod_morador`)
VALUES (NULL, 
'$Calendario', 
'$horaInicio', 
'$horaFim', 
'$cod_morador');")) {
        $msg = "<p class=sucesso>Registro gravado com Sucesso</p>";
    } else {
        $msg = "<p class=erro>Erro ao criar registro</p>";
    }
    session_start();
    $_SESSION['msg'] = $msg;

    //var_dump($_POST);
    //var_dump($_FILES);

    $status = "true";
    header("location:../intranet/salao.php");
} else {
    include('../intranet/barraSuperiorInt.php');

    echo " <div class=mensagemData>";
    echo "     <h1>Data / hora Invalída!!</h1>";
    echo " </div>";
    header("Refresh:1; url=../intranet/salao.php", true, 303);
}
