    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro </title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

    </head>
<body>
    <div class="login">
        <div class="acesso">
            Voce é administrador?
             <div class="btn_acessar">

             <input type="submit" name="submit" id="btn_submit" onclick= "window.location.href='login.php'" value= "Acessar">
             </div> 
        </div>
        <div class="logo">
            <img src="logoSmartech.png" class= "img_logo">
        </div>
        <div class="contato">  
    </form>

      <?php
      include("config.php");

    $stmt = $conn->prepare("SELECT * FROM servicos");
    $stmt-> execute();



    $servicos = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>
    
    </div>
    <div class="corpo">
        
        <form action="save.php" method="POST">
            <fieldset>
                <legend><b>Formulário de Cadastro de Condomínios</b></legend>
                <br>
                <div class="inputBox">
                    <input type="text" name="nome_condominio" id="nome_condominio" class="inputUser" required>
                    <label for="nome_condominio" class="labelInput">Nome do Condomínio</label>
                </div>
                <br><br>

                 <div class="inputBox">
                    <input type="text" name="cnpj" id="cnpj" class="inputUser" required>
                    <label for="cnpj" class="labelInput">CNPJ</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telelefone Condomínio</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                    <label for="cep" class="labelInput">Cep</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="rua" id="rua" class="inputUser" required>
                    <label for="rua" class="labelInput">Rua</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="bairro" id="bairro" class="inputUser" required>
                    <label for="bairro" class="labelInput">Bairro</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelInput">Cidade</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelInput">Estado</label>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="nome_sindico" id="nome_sindico" class="inputUser" required>
                    <label for="nome_sindico" class="labelInput">Responsavel pela Solicitação</label>
                </div>
                <br><br>

                <div class="inputBox">
                    <input type="text" name="contato_sindico" id="contato_sindico" class="inputUser" required>
                    <label for="contato_sindico" class="labelInput">Telelefone Do Responsável</label>
                </div>
                <br><br>

                <div class="">
                 <label >Qual serviço voce deseja?</label> 

                        <select name="servico_id" id="servicos" class="inputUser" required> 
                            <option value= "" > Selecione </option>
                            <?php foreach ($servicos as $res) { ?> 
                            <option value="<?php echo $res['id'];?>" >
                                <?php echo $res["serv"];?>
                            </option>
                            <?php } ?>
                        </select>
                </div>
                <br><br>
                
                <div class="inputBox">
                    <input type="text" name="info" id="info" class="inputUser" required>
                    <label for="info" class="labelInput">O que deseja?</label>
                </div>


                <div class="submit">
                <input type="submit" name="submit" onclick="myFunction()" id="btn_submit">
                </div>
                <script>
                function myFunction() {
                confirm("Realmente deseja enviar suas informações?");
                    }
</script>
            </fieldset>
        </form>
    </div>
                </body>
         
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

    
    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#estado").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#estado").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");}});} //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");}} //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();}});});

    </script>
    </head>
      </body>
      </html>

      