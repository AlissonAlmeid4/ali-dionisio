<?php
    if ( !@$con = mysqli_connect('localhost','root','','bd_condmind')){
        echo "Erro ao acessar a Base de Dados";
    };
    mysqli_query($con,"SET NAMES utf8");
?>