<?php


session_start(); 

$data = $_POST;

date_default_timezone_set('America/Sao_Paulo');

$dsn = "mysql:host=192.168.3.108; dbname=condominios";
$conf = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$horario = date('Y-m-d H:i:s');
$data['horario'] = $horario;
try {
  

  
  $conn = new PDO($dsn, "root", "root", $conf);

 
  $stmt = $conn->prepare("INSERT INTO informacoes (nome_condominio, cnpj, contato_sindico, cep, rua, bairro, cidade, estado, telefone, nome_sindico, info, horario, id, servico_id, status_id, user_id)
          VALUES(:var1, :var2, :var3, :var4, :var5, :var6, :var7, :var8, :var9, :var10, :var11, :var12, :var13, :var14, :var15, :var16)");
          
          
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
          "var12"=> $data['horario'],
          "var13"=> $data['id'],
          "var14"=> $data['servico_id'],
          "var15"=> $data['status_id'],
          "var16"=> $data['user_id']
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
  die;
}
