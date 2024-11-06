
<?php
    $texto = $_GET['texto'];
    require('connect.php');
if (strlen($texto) >= 3) {
    $moradores = mysqli_query($con, "Select * from `tb_morador` where `nome_completo` like '%$texto%' ");
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
    }
}
?>