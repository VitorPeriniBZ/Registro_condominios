<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> </title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    </head>
    <body>
    <?php

error_reporting(E_ALL);
ini_set("display_errors",1 );


$dsn = "mysql:host=192.168.3.108; dbname=condominios";
$conf = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try{
  $conn = new PDO($dsn, "root", "root", $conf);

  $stmt = $conn->prepare("SELECT * FROM informacoes ORDER BY `informacoes`.`horario` DESC" );
  $stmt-> execute();
  
   
  $list = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOexception $ex){          
        
        
        die($ex-> getMessage());
    }  
include 'header.php';
?>
<input class="btn_sair" type="submit" name="submit" value="Sair" onclick= "window.location.href='publico.php'" >

    <div class="titulo">
    <h1><b >Condomínios cadastrados</b></h1>
    </div>
                <br>
                <div class="fundo">
                    <table border= "1" style="border-collapse: collapse; color: white;"class="tabela">
                </div>
                
       
<tr>
    <th>Nome do Condominio</th>
    <th>Nome do Sindico</th>
    <th>Telefone Sindico</th>
    <th>Telefone Condominio</th>
    <th>CNPJ</th>
    <th>CEP</th>
    <th>Bairro</th>
    <th>Cidade</th>
    <th>Estado</th>
    <th>Informações</th>
    <th>Horario</th>
    <th>Administrativo</th>



    
</tr>
<?php foreach($list as $item ){ ?>
    <tr>
        <td> <?php echo $item['nome_condominio'] ?></td>
        <td> <?php echo $item['nome_sindico'] ?></td>
        <td> <?php echo $item['contato_sindico'] ?></td>
        <td> <?php echo $item['telefone'] ?></td>
        <td> <?php echo $item['cnpj'] ?></td>
        <td> <?php echo $item['cep'] ?></td>
        <td> <?php echo $item['bairro'] ?></td>
        <td> <?php echo $item['cidade'] ?></td>
        <td> <?php echo $item['estado'] ?></td>
        <td> <?php echo $item['info'] ?></td>
        <td> <?php echo $item['horario'] ?></td>
        <td> <?php echo $item['acompanhamento'] ?>
            <select name="sub" id="sub" value="red">
             <option value="s_acomp"> Sem Acompanhamento</option>
             <option value="nascimento"> Nascimento</option>
             <option value="miguel"> Miguel</option>
             <option value="Leonardo"> Leonardo </option>
             <option value="Josimar"> Josimar </option> </td>
    </tr>
<?php } ?>
</table>
      


</body> 
<?php
include 'footer.php';
