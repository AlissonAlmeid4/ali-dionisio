
<?php
$texto = $_GET['texto'];
require('connect.php');
if (strlen($texto) >= 3) {
    $usuarios = mysqli_query($con, "Select * from `tb_usuarios` where `primeiro_nome` like '%$texto%' ");
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
}
?>