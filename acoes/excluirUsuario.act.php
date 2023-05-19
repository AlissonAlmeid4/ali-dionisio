<?php
$codUsuario = $_GET['cod'];
require('connect.php');
extract($_POST);
    if(mysqli_query($con, "DELETE FROM `tb_usuarios` 
                           WHERE `tb_usuarios`.`cod_usuario` =  '$codUsuario';")){
        header("location: ../intranet/usuarios.php");
    }else{
        echo "Erro ao excluir!";
        header("location: ../intranet/usuarios.php");
    }