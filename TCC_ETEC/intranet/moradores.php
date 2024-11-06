<?php require('sec.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/moradores.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <title>Listar Morador</title>
    <script>
        function pesquisa(texto){
            $.ajax({
                type: "post",
                url: "../acoes/pesquisa.act.php?texto="+texto,
                success: function(response){
                    $('#result').html(response);
                }
            });
        };
    </script>
</head>
<body>
    <div class="msg"></div>

    <?php include('../intranet/barraSuperiorInt.php'); ?>
    <div class="barraLateral">
        <?php include('../intranet/barraLateral.php'); ?>
    </div>   

    <div class="pesquisar">
        <p>Pesquisar <input type="text" onKeyup="pesquisa(this.value)"></p>
    </div>
    <div class="cadastrar">
        <a href="../intranet/cadMorador.php">Cadastrar novo proprietario</a>
    </div>
    <div id="result"></div>
    
<?php
    @session_start();
    if(isset($_SESSION['msg'])){
        echo "<p class=alert> $_SESSION[msg]</p>";
        unset($_SESSION['msg']);
    }

      //Pegar o indice nna URL da página, caso não haja indice, atribua o valor 1
    $pagina = (isset($_GET['pagina'])) ?  $_GET['pagina'] : 1;   

    //Setar quantidade de itens por página
    $total_pagina = 3;

    //calcular o inicio da visualização

    $inicio = ($total_pagina * $pagina)-$total_pagina;
    

    require('../acoes/connect.php');
    $moradores = mysqli_query($con, "Select * from `tb_morador` limit $inicio, $total_pagina");
    echo "<table id=dtBasicExample class=table table-striped table-bordered table-sm cellspacing=0 height=100% width=100%>";

   //contar o total de registros no banco de dados 
    $total_registro = mysqli_num_rows($moradores);
    
    //calcular o nuúmero de páginas necessárias para apresentar os registros;
    $num_pagina = ceil($total_registro / $total_pagina);

    while($morador = mysqli_fetch_array($moradores)){
        echo "<div class=box1>";
        echo "<div class=caixaImagem>";
        echo "<p><img class=imgUsuario src=$morador[foto]></p>";
        echo "</div>";
        echo "<p class=cod> Codigo Morador:<b> $morador[cod_morador]</b></p>";
        echo "<div class=box>";
        echo "<p> Primeiro Nome:<b> $morador[primeiro_nome]</b></p>";
        echo "<p> Nome:<b> $morador[nome_completo]</b></p>";
        echo "</div>";
        echo "<div class=box>";
        echo "<p> CPF:<b> $morador[cpf]</b></p>";
        echo "<p> Função:<b> $morador[funcao]</b></p>";
        echo "</div>";
        echo "<div class=box>";
        echo "<p> RG:<b> $morador[rg]</b></p>";
        echo "<p> Bloco:<b> $morador[bloco]</b></p>";
        echo "</div>";
        echo "<div class=box>";
        echo "<p> Celular:<b> $morador[celular]</b></p>";
        echo "<p> Nº:<b> $morador[numero_apartamento]</b></p>";
        echo "</div>";
        echo "<div class=box>";
        echo "<p> E-mail:<b> $morador[email]</b></p>";
        echo "</div>";
        echo "<div class=box>";
        echo "<p> Data de Nascimento:<b> $morador[dtnascimento]</b></p>";
        echo "</div>";
        echo "<div class=box>";
        echo "<p> Estado Civil:<b> $morador[estadocivil]</b></p>";
        echo "</div>";
        echo "<div class=alterarExcluir>";
        echo "<p class=alterar> <a href =alterarMorador.php?cod=$morador[cod_morador]>Alterar</a></p>";
        echo "<p class=excluir> <a href =javascript:confirmar($morador[cod_morador])>Excluir</a></p>";
        echo "</div>";
        echo "</div>";
        echo "<div class=risco> </div>";
        
        echo "</table>";
    }

?>

<div class="paginacao">
 <!-- <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center"> -->
    <?php 
    //verificar a pagina anterior e posterior
    $pagina_anterior = $pagina - 1;
    $pagina_posterior = $pagina + 1;
    ?>

    <li>
        <?php 
            if($pagina_anterior != 0){  ?>
                <li class="page-item disabled">
                <a class="page-link" href="/software1/pages/intranet/moradores.php?pagina=<?php echo $pagina_anterior?>">Anterior</a>
              </li>
           <?php }else{
            
           } ?>
        
    </li>
  
    <?php  
      //apresentar a páginação
      for($i = 1; $i < $num_pagina + 1 ; $i++){  ?>
        <a  href="/software1/pages/intranet/moradores.php?pagina=<?php echo $i?>"><?php echo $i ?></a></li>
     <?php  } ?>

     <?php 
    //  var_dump($num);
    //  var_dump($pagina_anterior);
    //  var_dump($num_pagina);
    //  var_dump($pagina_posterior);
    //  ?>   


        <li>
        <?php 


            if($pagina_posterior >= $num_pagina){  ?>
                
                <a class="page-link" href="/software1/pages/intranet/moradores.php?pagina=<?php echo $pagina_posterior?>">Próximo</a>
              </li>
           <?php }else{ ?>
            <li class="disabled">
                <a class="page-link" href="/software1/pages/intranet/moradores.php?pagina="></a>
              </li>
        <?php   } ?>
        
         </li>
    
            </ul>
    <!-- </nav> -->
           </div>









<script>
    function confirmar(codigo) {
        resposta = confirm("Deseja excluir o registro "+codigo+"?");
        if(resposta == true){
            window.location = "../acoes/excluirMorador.act.php?cod="+codigo;
        }
    }
</script>
</body>
</html>