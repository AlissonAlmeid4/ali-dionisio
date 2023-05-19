<style>
    .morador{
        display: none;
    }
    
</style>

<?php

require('../acoes/connect.php');

@session_start();
$usuario = $_SESSION['usuarioLogin'];

$busca = mysqli_query($con, "SELECT * FROM `tb_usuarios` where `usuario` = '$usuario'");
$controle = mysqli_fetch_array($busca);
$controleMorador = "";
$campo = "";

$moradores = mysqli_query($con, "Select cpf from `tb_morador`");
$morador = mysqli_fetch_array($moradores);

$mor = array($morador);

if ($controle['funcao'] == 'Morador' ) {
    $controleMorador = "morador";
    $campo = "disabled";

    
}
if ($controle['funcao'] == 'Morador') {
    $minhaVaga = "minhaVaga.php";
}else if($controle['funcao'] == 'Administrador'){
    $minhaVaga = "viewMinhaVaga.php";
}
        
    


    //header("location:../publico/index.php");
