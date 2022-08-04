<?php 
$dsn = "mysql:host=192.168.3.108; dbname=condominios";
$conf = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

    try{
  $conn = new PDO($dsn, "root", "root", $conf);

  $stmt = $conn->prepare("SELECT * FROM informacoes where id=$id");
  $stmt-> execute();
  
   
  $list = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    }catch(PDOexception $ex){          

        
        die($ex-> getMessage());
    } 
?>