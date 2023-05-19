<?php
extract($_POST);
require('../acoes/connect.php');

@session_start();
$busca = mysqli_query($con, "SELECT * FROM `tb_usuarios` where `usuario` = '$cpf'");
$buscaMorador = mysqli_query($con, "SELECT * FROM `tb_morador` where `cpf` = '$cpf'");

if ($busca->num_rows == 1) {
    $contato = mysqli_fetch_array($busca);
    $morador = mysqli_fetch_array($buscaMorador);
    $emailRecuperar = $morador['email'];

    // emails para quem será enviado o formulário
    $destino = $emailRecuperar;
    $assunto = "Contato pelo Site";

    // É necessário indicar que o formato do e-mail é html
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: $nome <$email>';
    //$headers .= "Bcc: $EmailPadrao\r\n";

    $enviaremail = mail($destino, $assunto, $headers);
    if ($enviaremail) {
        $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
        echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
    } else {
        $mgm = "ERRO AO ENVIAR E-MAIL!";
        echo "";
    }

    $msg = "ok";
    //$target = "location:../publico/recuperarSenha.php";
} else {
    $target = "location:../publico/esqueciMinhaSenha.php";
    $msg = "O CPF digitado não foi encontrado";
}

$_SESSION['msg'] = $msg;
header($target);

?>
