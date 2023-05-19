<?php

extract($_POST);
require('../acoes/connect.php');


if (mysqli_query($con, "INSERT INTO `tb_vaga_garagem` (`cod_vaga`,
                                                      `num_vaga`,
                                                      `tipo_vaga`,
                                                      `ocupada`,
                                                      `placa_veiculo`) 
  VALUES (null,
  '$num_vaga',
  '$tipo_vaga',
  '$ocupada',
  '$placa_veiculo');")) {
   $msg = "<p class=sucesso>Registro gravado com Sucesso</p>";
} else {
   $msg = "<p class=erro>Erro ao criar registro</p>";
}
session_start();
$_SESSION['msg'] = $msg;

var_dump($_FILES);
var_dump($_POST);



header("location:../intranet/minhaVaga.php");
