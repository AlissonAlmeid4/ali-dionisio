<?php

extract($_POST);
require('../acoes/connect.php');


if (mysqli_query($con, "UPDATE `tb_vaga_garagem` SET 
                                    `num_vaga` = '$num_vaga',
                                    `tipo_vaga` = '$tipo_vaga',
                                    `ocupada` = '$ocupada',
                                    `placa_veiculo` = '$placa_veiculo'

                                    WHERE `tb_vaga_garagem`.`cod_vaga` = '$cod_vaga';")) {
    $msg = "Alterado com sucesso!";
} else {
    $msg = "Erro ao alterar!";
}
session_start();
$_SESSION['msg'] = $msg;
$usuarioLogin = $_SESSION['usuarioLogin'];
header("location:../intranet/minhaVaga.php");
