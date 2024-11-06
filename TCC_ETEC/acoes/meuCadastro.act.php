<?php
    
    require('../acoes/connect.php');
    
    session_start();
    $usuarioLogin = $_SESSION['usuarioLogin'];

    extract($_FILES);
    extract($_POST);

    
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
                                    `numero_apartamento` = '$numero_apartamento'
                                    WHERE `tb_morador`.`cpf` = '$usuarioLogin';")){
                                $msg = "Alterado com sucesso!";
                        }else{
                                $msg = "Erro ao alterar!";
                            }

var_dump($_FILES);
var_dump($_POST);


header("location:../intranet/meuCadastro.php?cpf=$usuarioLogin");                         