<?php

require('connect.php');
extract($_POST);

$senha = md5($senha);
if(mysqli_query($con, "INSERT INTO `tb_usuarios` (`cod_usuario`,
                                                  `usuario`,
                                                  `senha`,
                                                  `funcao`)
VALUES (NULL, 
       '$usuario',
       '$senha',
       '$funcao');")){
    $msg = "<p class=sucesso> Registro gravado com Sucesso</p>";
}else{
    $msg = "<p class=erro> Erro ao criar registro</p>";
}
session_start();
$_SESSION['msg'] = $msg;

var_dump($_POST);
echo $senha;

header("location:../intranet/cadUsuario.php");