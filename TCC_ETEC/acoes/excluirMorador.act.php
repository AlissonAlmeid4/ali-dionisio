<?php
$codMorador = $_GET['cod'];
require('connect.php');
extract($_POST);
    if(mysqli_query($con, "DELETE FROM `tb_morador` 
                           WHERE `tb_morador`.`cod_morador` =  '$codMorador';")){
        header("location: ../intranet/moradores.php");
    }else{
        echo "Erro ao excluir!";
        header("location: ../intranet/moradores.php");
    }