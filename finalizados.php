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
    

    $stmt = $conn->prepare("SELECT * FROM informacoes  WHERE statuses='finalizado' " );
    $stmt-> execute();
    $list = $stmt-> fetchAll(PDO::FETCH_ASSOC);
 

    // $grid = [];
    // foreach ($list as $info) {
    //     $stmt = $conn->prepare("SELECT * FROM inf_stat_user isu JOIN statuses sta ON sta.id = isu.status_id WHERE isu.info_id = {$info['id']} ORDER BY isu.id DESC");
    //     $stmt-> execute();
    //     $nn = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    //     if (count($nn) > 0) {
    //         $info['status'] = $nn[0]['name'];
    //     }
    //     $grid[] = $info;



    //     $stmt = $conn->prepare("SELECT * FROM inf_stat_user isu JOIN users usr ON usr.id = isu.user_id WHERE isu.info_id = {$info['id']}");
    //     $stmt-> execute();
    //     $nn = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    //     if (count($nn) > 0) {
    //     $info['users'] = $nn[0]['username'];
    //     }
    //        $grid[] = $info;



    //     $stmt = $conn->prepare("SELECT * FROM info_serv ins JOIN servicos ser ON ser.id = ins.serv_id WHERE ins.info_id = {$info['id']}");
    //     $stmt-> execute();
    //     $serv = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    //     if (count($serv) > 0) {
    //         $info['servicos'] = $serv[0]['name'];
    //     }
    //         $grid[] = $info;

    // }
    

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
    <th>Horario</th>
    <th>Pedido</th>
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
        <td> <?php echo date("d/m/Y H:m",strtotime($item['horario'])) ?></td>
        <td> <?php echo $item['servico_id'] ?></td> 
        <td> <?php echo $item['user_id'] ?></td>
        <td> <?php echo $item['status_id'] ?></td>
    
        <td>  <a href='edit.php?id=<?php echo $item['id'];?>'>Editar</a> </td>
    </tr>
<?php } ?>
</table>
      


</body> 
<?php
include 'footer.php';