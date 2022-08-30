<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  
</body>
</html>

<?php

session_start();
if(!empty($_POST['login']) && !empty($_POST['senha'])){
   
  $login = $_POST['login'];
$senha = $_POST['senha'];
    

if ($login == 'root' && $senha == 'root'){
     $_SESSION['logado']= true;
           //salvar informação que o usuario está logado em sessão.
    header("Location: home.php");
    }else{  
    echo "Login ou senha inválidos";
    }    
    echo "<hr/>";    
}
include 'header.php';
?>

</head>
<body>
  <div class="corpo_2">
    <form action="home.php" method="POST">
      <fieldset class="fieldset_2">
        <legend><b></b>Entrar como Administrador</legend>
        <br>
                <div class="inputBox">
                  <input type="text" name="login" id="login" class="inputUser" required>
                  <label for="login" class="labelInput">Login</label>
                </div>
                <br><br>
                <div class="inputBox">
                  <input type="password" name="login" id="password" class="inputUser" required>
                  <label for="password" class="labelInput">Senha</label>
                </div>
                <br><br>
                <div class="entrar">
                  <input class="btn_entrar" type="submit" name="submit" value="Entrar"><br>
                  <input class="btn_entrar" type="submit" name="submit" value="Voltar" onclick= "window.location.href='publico.php'" >
                </div>
              </form>

             
  
<?php include 'footer.php'; ?>