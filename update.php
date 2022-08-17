<?php
error_reporting(E_ALL);
ini_set("display_errors",1 );

$data = $_POST;

try {
    
   
    $dsn = "mysql:host=192.168.3.108; dbname=condominios";
    $conf = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
  
    $conn = new PDO($dsn, "root", "root", $conf);

   
    $stmt = $conn->prepare ("UPDATE informacoes SET
    nome_condominio = :var1,
    cnpj = :var2,
    contato_sindico = :var3,
    cep = :var4,
    rua = :var5,
    bairro = :var6,
    cidade = :var7,
    estado = :var8,
    telefone = :var9,
    nome_sindico = :var10,
    info = :var11,
    horario_alterado = :var13
    WHERE id = :var14");
    

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
            "var13"=> date('Y-m-d H:i:s'),
            "var14"=> $data['id'],
            
            ]); 
            
            
            
          } catch (PDOexception $ex) {
            die($ex->getMessage());
          }

          if (!isset($_SESSION["logado"]) ||$_SESSION["logado"]!= true ) {
            header("Location: home.php");
              return;  
          } 
?>