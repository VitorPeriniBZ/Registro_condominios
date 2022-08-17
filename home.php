<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros de Condominio </title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    </head>
    <body>
        <?php

error_reporting(E_ALL);
ini_set("display_errors",1 );


include("config.php");

try{
    $conn = new PDO($dsn, "root", "root", $conf);
    
    $stmt = $conn->prepare("SELECT * FROM informacoes ORDER BY `informacoes`.`horario` ASC " );
    
    $stmt-> execute();
    
    
    $list = $stmt-> fetchAll(PDO::FETCH_ASSOC);
}catch(PDOexception $ex){          
    
    
    die($ex-> getMessage());
}  
include 'header.php';
?>

<div class="titulo">
    <h1><b>Condomínios cadastrados</b></h1>
    </div>

<input class="btn_sair" type="submit" name="submit" value="Sair" onclick= "window.location.href='publico.php'" >

<input class= "finalizados" type="submit" name="submit" value= "Finalizados" onclick= "window.location.href='finalizados.php'" >

    
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
    <th>Observações</th>
    <th>Pedido</th>
    <th>Horario</th>
    <th>Administrativo</th>
    <th>Status</th>



    
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
        <td> <?php echo $item['servicos'] ?></td>
        <td> <?php echo date("d/m/Y H:m",strtotime($item['horario'])) ?></td>
        <td> <?php echo $item['users'] ?></td>
        <td> <?php echo $item['statuses'] ?></td>

        <td>  <a href='edit.php?id=<?php echo $item['id'];?>'>Editar</a> </td>
    </tr>
<?php } ?>
</table>
      


</body> 
<?php
include 'footer.php';