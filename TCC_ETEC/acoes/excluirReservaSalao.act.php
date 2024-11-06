<?php
$codSalao = $_GET['cod'];
require('connect.php');
extract($_POST);
    if(mysqli_query($con, "DELETE FROM `tb_salao` 
                           WHERE `tb_salao`.`cod_salao` =  '$codSalao';")){
       header("location: ../intranet/salao.php");
    }else{
        echo "Erro ao excluir!";
       header("location: ../intranet/salao.php");
    }