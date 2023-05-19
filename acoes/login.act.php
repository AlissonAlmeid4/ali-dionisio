<?php
extract($_POST);
$senha = md5($senha);
require('../acoes/connect.php');

@session_start();
$busca = mysqli_query($con, "SELECT * FROM `tb_usuarios` where `usuario` = '$usuario'");
if($busca->num_rows ==1){
    $contato = mysqli_fetch_array($busca);
    if($senha === $contato['senha']){
        $_SESSION['login'] = true;
        $_SESSION['nome'] = $contato['primeiro_nome'];
        $_SESSION['usuarioLogin'] = $usuario;
        $target = "location:../intranet/intranet.php";
        
    }else{
        $target = "location:../publico/login.php";
        $msg = "Email ou senha Invalido";
    }
}else{
    $target = "location:../publico/login.php";
    $msg = "Email ou senha Invalido";
}
echo $usuario;
echo $senha;

$_SESSION['msg'] = $msg;
header($target);