<?php
$cod_vaga = $_GET['cod'];
require('connect.php');
extract($_POST);
    if(mysqli_query($con, "DELETE FROM `tb_vaga_garagem` 
                           WHERE `tb_vaga_garagem`.`cod_vaga` =  '$cod_vaga';")){
       header("location: ../intranet/minhaVaga.php");
    }else{
        echo "Erro ao excluir!";
       header("location: ../intranet/minhaVaga.php");
    }

    var_dump($_FILES);
var_dump($_POST);
