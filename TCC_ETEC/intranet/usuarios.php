<?php require('sec.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/moradores.css">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <title>Listar Usuários</title>
    <script>
        function pesquisa(texto) {
            $.ajax({
                type: "post",
                url: "../acoes/pesquisaUsuario.act.php?texto=" + texto,
                success: function(response) {
                    $('#result').html(response);
                }
            });
        };
    </script>
</head>

<body>
    <?php include('../intranet/barraSuperiorInt.php'); ?>
    <div class="barraLateral">
        <?php include('../intranet/barraLateral.php'); ?>
    </div>  

    <div class="pesquisar">
        <p>Pesquisar <input type="text" onKeyup="pesquisa(this.value)"></p>
    </div>
    <!-- <div class="cadastrar">
        <a href="../intranet/cadUsuario.php">Cadastrar</a>
    </div> -->
    <div id="result"></div>

    <?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo "<p class=alert> $_SESSION[msg]</p>";
        unset($_SESSION['msg']);
    }

    
    //Pegar o indice nna URL da página, caso não haja indice, atribua o valor 1
    $pagina = (isset($_GET['pagina'])) ?  $_GET['pagina'] : 1;   

    //Setar quantidade de itens por página
    $total_pagina = 5;

    //calcular o inicio da visualização

    $inicio = ($total_pagina * $pagina)-$total_pagina;


    require('../acoes/connect.php');
    $usuarios = mysqli_query($con, "Select * from `tb_usuarios` limit $inicio, $total_pagina");

    //contar o total de registros no banco de dados 
    $total_registro = mysqli_num_rows($usuarios);
        
    //calcular o nuúmero de páginas necessárias para apresentar os registros;
    $num_pagina = ($total_registro / $total_pagina);

    while ($usuario = mysqli_fetch_array($usuarios)) {
        echo "<div class=box2>";

        echo "<div class=box1>";
        echo "<div class=box>";
        echo "<p> Cod. Usuário:<b> $usuario[cod_usuario]</b></p>";
        echo "<p> Primeiro Nome:<b> $usuario[primeiro_nome]</b></p>";
        echo "</div>";
        echo "<div class=box>";
        echo "<p> Usuário:<b> $usuario[usuario]</b></p>";
        echo "<p> Função:<b> $usuario[funcao]</b></p>";
        echo "</div>";
        echo "<div class=box>";
        echo "<p> Senha:<b> $usuario[senha]</b></p>";
        echo "</div>";
        echo "<div class=alterarExcluir>";
        echo "<p class=alterar> <a href =alterarUsuario.php?cod=$usuario[cod_usuario]>Alterar</a></p>";
        echo "<p class=excluir> <a href =javascript:confirmar($usuario[cod_usuario])>Excluir</a></p>";
        echo "</div>";
        echo "</div>";
        echo "<div class=risco> </div>";
        echo "</div>";
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
                <a class="page-link" href="/software1/pages/intranet/usuarios.php?pagina=<?php echo $pagina_anterior?>">Anterior</a>
              </li>
           <?php }else{
            
           } ?>
        
    </li>
  
    <?php  
      //apresentar a páginação
      for($i = 1; $i < $num_pagina + 1 ; $i++){  ?>
        <a  href="/software1/pages/intranet/usuarios.php?pagina=<?php echo $i?>"><?php echo $i ?></a></li>
     <?php  } ?>

     <?php 
     var_dump($total_pagina);
     var_dump($total_registro);
     var_dump($num_pagina);
    //  var_dump($num);
    //  var_dump($pagina_anterior);
    //  var_dump($num_pagina);
    //  var_dump($pagina_posterior);
    //  ?>   


        <li>
        <?php 


            if($pagina_posterior >= $num_pagina){  ?>
                
                <a class="page-link" href="/software1/pages/intranet/usuarios.php?pagina=<?php echo $pagina_posterior?>">Próximo</a>
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
            resposta = confirm("Deseja excluir o registro " + codigo + "?");
            if (resposta == true) {
                window.location = "../acoes/excluirUsuario.act.php?cod=" + codigo;
            }
        }
    </script>
</body>

</html>