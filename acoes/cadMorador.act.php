<style>
   .mensagemCPF {
      display: flex;
      justify-content: center;
      border: 2px solid black;
      margin-left: 15rem;
      margin-right: 15rem;
      margin-top: 15rem;
   }
</style>
<?php

require('connect.php');
extract($_FILES);
extract($_POST);

//if (empty($foto)) {
$endereco = "../imgs/" . md5(time()) . ".jpg";
//} 

move_uploaded_file($foto['tmp_name'], $endereco);

extract($_POST);

if (@validateCPF($cpf)) {
   echo "válido";

   if (mysqli_query($con, "INSERT INTO `tb_morador` (`cod_morador`, 
                                                `primeiro_nome`, 
                                                `nome_completo`,
                                                `email`,
                                                `cpf`, 
                                                `rg`,
                                                `dtnascimento`,
                                                `celular`,
                                                `estadocivil`,
                                                `bloco`,
                                                `numero_apartamento`,
                                                `funcao`,
                                                `foto`)
VALUES (NULL, 
'$primeiro_nome',
'$nome_completo', 
'$email', 
'$cpf', 
'$rg', 
'$dtnascimento',
'$celular', 
'$estadocivil', 
'$bloco', 
'$numero_apartamento',
'$funcao',
'$endereco');")) {
      $msg = "<p class=sucesso>Registro gravado com Sucesso</p>";
   } else {
      $msg = "<p class=erro>Erro ao criar registro</p>";
   }
   session_start();
   $_SESSION['msg'] = $msg;

   var_dump($_FILES);
   var_dump($_POST);


   header("location:../intranet/moradores.php");
} else {
    include('../intranet/barraSuperiorInt.php'); 

   echo " <div class=mensagemCPF>";
   echo "     <h1>CPF invalido</h1>";
   echo " </div>";
   header("Refresh:1; url=../intranet/cadMorador.php", true, 303);
}

function validateCPF($cpf)
{

   $cpf = preg_replace('/[^0-9]/is', '', $cpf);

   // Verifica se foi informado todos os digitos corretamente
   if (strlen($cpf) != 11) {
      return false;
   }

   // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
   if (preg_match('/(\d)\1{10}/', $cpf)) {
      return false;
   }

   // Faz o calculo para validar o CPF
   for ($t = 9; $t < 11; $t++) {
      for ($d = 0, $c = 0; $c < $t; $c++) {
         $d += $cpf[$c] * (($t + 1) - $c);
      }
      $d = ((10 * $d) % 11) % 10;
      if ($cpf[$c] != $d) {
         return false;
      }
   }
   return true;
}
