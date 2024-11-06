<?php require('sec.php') ?>
<link rel="stylesheet" href="../estilo/salao.css">


<h1>Lista de Eventos</h1>
<?php
@session_start();
if (isset($_SESSION['msg'])) {
    echo "<p class=alert> $_SESSION[msg]</p>";
    unset($_SESSION['msg']);
    $_SESSION['usuarioLogin'] = $usuario;
}
require('../acoes/connect.php');

$salaos = mysqli_query($con, "SELECT * FROM `tb_salao`");
echo "<table class='table table-hover table-bordered'>";
echo "<tr>";
echo "<th>#</th>";
echo "<th>Data do Evento</th>";
echo "<th>Horario de inicio</th>";
echo "<th>Horario do fim</th>";
echo "<th>Nome do morador</th>";
echo "<th>Ações</th>";
echo "</tr>";
while ($salao = mysqli_fetch_array($salaos)) {
    $moradores = mysqli_query($con, "Select * from `tb_morador` where cod_morador = $salao[cod_morador]");
    echo "<tr>";
    echo "<td><strong>#</strong> $salao[cod_salao]  </td>";
    echo "<td><strong>Data do Evento: </strong> $salao[data_reserva] </td>";
    echo "<td><strong>Horario Inicio: </strong> $salao[hora_inicio] </td>";
    echo "<td><strong>Horario Fim: </strong> $salao[hora_fim] </td>";
    while ($morador = mysqli_fetch_array($moradores)) {
        $nome = strtoupper("$morador[primeiro_nome]");
        $verificador = $salao['cod_morador'];
        echo "<td><strong>Nome Morador: </strong> $nome </td>";

        if (in_array($usuario, $morador)) {
            echo "<td>
                    <button onclick=\"location.href='alterarReservaSalao.php?page=editar&cod=$salao[cod_salao]';\" class='btn btn-success' >Editar</button>
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir? id: $salao[cod_salao]')){location.href='../acoes/excluirReservaSalao.act.php?cod=$salao[cod_salao]';}else{false;}\" class='btn btn-danger'>Excluir</button>           
            </td>";
        } else if ($controle['funcao'] == 'Administrador') {
            echo "<td>
                    <button onclick=\"location.href='alterarReservaSalao.php?page=editar&cod=$salao[cod_salao]';\" class='btn btn-success' >Editar</button>
                    <button onclick=\"if(confirm('Tem certeza que deseja excluir? id: $salao[cod_salao]')){location.href='../acoes/excluirReservaSalao.act.php?cod=$salao[cod_salao]';}else{false;}\" class='btn btn-danger'>Excluir</button>           
            </td>";
        } else {
            echo "<td></td>";
        }
    }
}
echo "</tr>";

echo "</table>";
