<?php
 
    extract($_POST);
    require('../acoes/connect.php');
    $senha = md5($senha);
   
    
    if(mysqli_query($con, "UPDATE `tb_usuarios` SET 
                                    `senha` = '$senha'
                                    WHERE `tb_usuarios`.`cod_usuario` = '$codUsuario';")){
                                $msg = "Alterado com sucesso!";
                        }else{
                                $msg = "Erro ao alterar!";
                            }
session_start();
$_SESSION['msg'] = $msg;    
$usuarioLogin = $_SESSION['usuarioLogin'];                    
header("location:../intranet/usuarios.php");                         