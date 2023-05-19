<?php

extract($_POST);
require('connect.php');

if(mysqli_query($con,"INSERT INTO `tb_fale_conosco`(
                                    `cod_msg`, 
                                    `via`, 
                                    `nome_completo`, 
                                    `email`, 
                                    `celular`, 
                                    `assunto`, 
                                    `mensagem`)
 VALUES (null,
         '$via',
         '$nome_completo',
         '$email',
         '$celular',
         '$assunto',
         '$mensagem');")){
$msg = "<p class=sucesso>Registro gravado com Sucesso</p>";

} else {
    $msg = "<p class=erro>Erro ao criar registro</p>";
 }


session_start();
$_SESSION['msg'] = $msg;

header("location:../intranet/fale_conosco.php");                         















?>