<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilo/shannon.css">
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../jquery/jquery.mask.js"></script>

    <title>Fale conosco</title>
</head>

<style>
    


#formulario{
    margin: 50px  auto;
    width: 840px;
    height: auto;
}
@media screen and (max-width: 480px) {
    #formulario{
    margin: 50px  auto;
    width: 440px;
    height: auto;
}

}

</style>
<body>

    <div class="barraLateral">
        <?php include('../intranet/barraLateral.php'); ?>
    </div>
    <?php include('../intranet/barraSuperiorInt.php'); ?>
    <div id="formulario">
        <div class="fale_conosco"><!--COMEÇO DA SESSÃO fALE CONOSCO-->

            <form action="../acoes/fale_conosco.act.php" method="post">
                <div class="forms">
                        <nav class="nome">
                            <label for="nome_completo">NOME COMPLETO</label>
                            <input type="text" name="nome_completo" id="nome" placeholder="Digite seu nome">
                            <input type="hidden" name="via" value="CondMind">
                        </nav>

                                <div class="clear"></div>

                    <nav class="email">
                            <label for="email">EMAIL</label>
                            <input type="email" name="email" id="email" placeholder="Digite seu email">
                    </nav>

                    <nav class="telefone">
                        <label for="celular">TELEFONE</label>
                        <input type="number"  name="celular" id="celular" placeholder="(00) 00000-0000">
                    </nav>
                    
                    <nav class="assunto">
                        <p>ASSUNTO</p>
                    
                        <select name="assunto" >
                        <option >Selecione uma opção</option>
                            <option >Dúvida</option>
                            <option >Contrato</option>
                            <option >Softwares</option>
                        
                        </select>
                    </nav>

                    <nav class="mensagem">
                    <p>MENSAGEM</p>
                    <textarea name="mensagem"  placeholder="Digite a sua mensagem" id="area_texto" ></textarea>
                        </nav>

                    <input type="submit" value="ENVIAR" id="btn_contato" onclick="clique()">
                        <div class="enviado">
                        <p id=mensagem></p>
                        </div>
                 </div>

             </form>

         </div>

    </div>


</body>

</html>

<script>

var $j = jQuery.noConflict();
// Use jQuery com a variavel $j para evitar conflitos
$j(document).ready(function(){
$j('#celular').mask("(00) 00000-0000"); // onde #telefone é o id do campo

});
</script>
