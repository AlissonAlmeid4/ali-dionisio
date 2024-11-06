<?php require('sec.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CondMind</title>
    <script src="../src/javascript.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilo/cadastro.css">

    <script src="../src/javascript.js"></script>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../jquery/jquery.mask.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


    <script>
        function pesquisa(texto) {
            console.log(texto)
            $.ajax({
                type: "post",
                url: "../acoes/pesquisa.act.php?texto=" + texto,
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
    <div id="result"></div>
    <?php
    function validateCPF($number)
    {

        $cpf = preg_replace('/[^0-9]/', "", $number);

        if (strlen($cpf) != 11 || preg_match('/([0-9])\1{10}/', $cpf)) {
            return false;
        }

        $number_quantity_to_loop = [9, 10];

        foreach ($number_quantity_to_loop as $item) {

            $sum = 0;
            $number_to_multiplicate = $item + 1;

            for ($index = 0; $index < $item; $index++) {

                $sum += $cpf[$index] * ($number_to_multiplicate--);
            }

            $result = (($sum * 10) % 11);

            if ($cpf[$item] != $result) {
                return false;
            }
        }

        return "true";
    }
    ?>
    <?php

    @session_start();
    if (isset($_SESSION['msg'])) {
        echo "<p class=alert>$_SESSION[msg]</p>";
        unset($_SESSION['msg']);
        unset($_SESSION['mensagemCPF']);
        echo "<p class=alert>$_SESSION[mensagemCPF]</p>";
    }
    ?>
    <div class="msg"></div>

    <div class="mt-5 container text-center">
        <div class="row ">
            <div class="col">
                <!--  primeira coluna -->
                <div class="imglogo">
                    <label>
                        <h1>Cadastre-se</h1>
                    <div class="imagemPromocional">
                        <img src="../imagens/timido.png" alt="" srcset="">
                    </div>
                    </label>
                </div>
            </div>
            <div class="cadastro col mt-3">
                <!--Segunda coluna -->

                <form class=" mt-5 row g-3 " action="../acoes/cadMorador.act.php" method="post" enctype="multipart/form-data">
                    <div class="mx-auto">
                        <p><label for="fileFoto" id="lblFoto">Foto</label> </p>
                        <p><input type="file" name="foto" id="fileFoto"> </p>
                    </div>

                    <div class="col-md-4">

                        <label for="primeironome" class="form-label">Primeiro nome</label>
                        <input type="text" name="primeiro_nome" class="form-control" id="validationDefault02" required>
                    </div>
                    <div class="col-md-8">
                        <label for="nomecompleto" class="form-label">Nome Completo</label>
                        <input type="text" name="nome_completo" class="form-control" id="validationDefault02" required>
                    </div>

                    <div class="col-4">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" class="cpf form-control" id="cpf" onKeyup="pesquisa(this.value)" name="cpf" placeholder="111.111.111.11" required>

                    </div>
                    <div class="col-4">
                        <label for="rg" class="form-label">RG</label>
                        <input type="text" class="form-control" name="rg" id="validationDefault02" placeholder="11.111.111-1" required>
                    </div>
                    <div class="col-md-4">
                        <label for="dtnascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" class="form-control" name="dtnascimento" id="validationDefault02" required>
                    </div>
                    <div class="col-md-4">
                        <label for="celular" class="form-label">Celular</label>
                        <input type="text" class="form-control" name="celular" id="validationDefault02" required>
                    </div>
                    <div class="col-md-4 ">
                        <label for="estadocivil" class="form-label">Estado Civil</label>
                        <select type="text" id="validationDefault02" name="estadocivil" class="form-control" required>
                            <option select></option>
                            <option>Solteiro(a)</option>
                            <option>Casado(a)</option>
                            <option>Viuvo(a)</option>
                            <option>Divorciado(a)</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Bloco</label>
                        <input type="number" class="form-control" name="bloco" id="validationDefault02">
                    </div>
                    <div class="col-md-2">
                        <label for="inputZip" class="form-label">Nº AP</label>
                        <input type="number" class="form-control" name="numero_apartamento" id="validationDefault02">
                    </div>
                    <div class="col-md-8 ">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" id="validationDefault02" required>
                    </div>
                    <div class="col-md-4">
                        <label for="estadocivil" class="form-label">Função</label>
                        <select type="text" id="validationDefault02" name="funcao" class="form-control" required>
                            <option select></option>
                            <option>Morador</option>
                            <option>Administrador</option>
                            <option>Porteiro</option>
                        </select>
                    </div>
                    <div class="col-12 ">
                        <button type="submit" class="mt-4 p-2 px-5 btn btn-primary">Cadastrar</button>
                </form>
            </div>
            <button onclick="cancelarMorador()" class="mt-4 p-2 px-5 btn btn-primary">Cancelar</button>
        </div>
    </div>
    </div>

</body>

</html>

<script>
    var $j = jQuery.noConflict();
    // Use jQuery com a variavel $j para evitar conflitos
    $j(document).ready(function() {
        $j('#celular').mask("(00) 00000-0000");
        $j('#cpf').mask("00000000000");
        $j('#rg').mask("000000000");
        // onde #telefone é o id do campo

    });
</script>