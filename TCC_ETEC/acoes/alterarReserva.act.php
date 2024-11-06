<?php

extract($_POST);
require('../acoes/connect.php');


if (mysqli_query($con, "UPDATE `tb_salao` SET 
                                    `data_reserva` = '$data_reserva',
                                    `hora_inicio` = '$hora_inicio',
                                    `hora_fim` = '$hora_fim'
                                    WHERE `tb_salao`.`cod_salao` = '$cod_salao';")) {
    $msg = "Alterado com sucesso!";
} else {
    $msg = "Erro ao alterar!";
}
session_start();
$_SESSION['msg'] = $msg;
$usuarioLogin = $_SESSION['usuarioLogin'];
header("location:../intranet/salao.php");
