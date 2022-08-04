<?php
error_reporting(E_ALL);
ini_set("display_errors",1 );


session_start(); 

$data = $_POST;

date_default_timezone_set('America/Sao_Paulo');

$dsn = "mysql:host=192.168.3.108; dbname=condominios";
$conf = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$horario = date('d-m-Y H:i:s');
$data['horario'] = $horario;
try {
  
  
  $conn = new PDO($dsn, "root", "root", $conf);
  
  $stmt = $conn->prepare("INSERT INTO informacoes (nome_condominio, cnpj, contato_sindico, cep, rua, bairro, cidade, estado, telefone, nome_sindico, info, horario)
          VALUES(:var1, :var2, :var3, :var4, :var5, :var6, :var7, :var8, :var9, :var10, :var11, :var12)");
          
          
          $stmt->execute([
          "var1"=> $data['nome_condominio'], 
          "var2"=> $data ['cnpj'], 
          "var3"=> $data['contato_sindico'],
          "var4"=> $data['cep'], 
          "var5"=> $data['rua'], 
          "var6"=> $data['bairro'], 
          "var7"=> $data['cidade'],
          "var8"=> $data['estado'], 
          "var9"=> $data['telefone'],
          "var10"=> $data['nome_sindico'],
          "var11"=> $data['info'],
          "var12"=> $data['horario']
        ]);
          
          
          
        } catch (PDOexception $ex) {
          die($ex->getMessage());
        }
        

// verificar se o usuario está logado
if (!isset($_SESSION["logado"]) ||$_SESSION["logado"]!= true ) {
  header("Location: publico.php");
    return;  
} else {
  header("Location: home.php");
  return;
}

