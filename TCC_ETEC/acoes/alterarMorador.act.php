<?php
    var_dump($_FILES);
    extract($_FILES);
    extract($_POST);
    require('../acoes/connect.php');

    
    if($imagem['size']>0){
        if($foto_anterior == ""){
            $endereco = "imgs/".md5(time()).".jpg";
        }else{
            $endereco = $foto_anterior;
        }
        move_uploaded_file($imagem['tmp_name'], $endereco);
    }else{
        $endereco = $foto_anterior;
    }
    
    if(mysqli_query($con, "UPDATE `tb_morador` SET 
                                    `foto` = '$endereco',
                                    `primeiro_nome` = '$primeiro_nome',
                                    `nome_completo` = '$nome_completo', 
                                    `email` = '$email', 
                                    `cpf` = '$cpf',
                                    `rg` = '$rg',
                                    `dtnascimento` = '$dtnascimento',
                                    `celular` = '$celular',
                                    `estadocivil` = '$estadocivil',
                                    `bloco` = '$bloco',
                                    `numero_apartamento` = '$numero_apartamento',
                                    `funcao` = '$funcao'
                                    WHERE `tb_morador`.`cod_morador` = '$cod_morador';")){
                                $msg = "Alterado com sucesso!";
                        }else{
                                $msg = "Erro ao alterar!";
                            }
session_start();
$_SESSION['msg'] = $msg;    
$usuarioLogin = $_SESSION['usuarioLogin'];     
header("location:../intranet/moradores.php");                         