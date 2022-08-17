
<?php 

session_start();
unset($_SESSION["logado"]);
session_destroy();
header("Location: publico.php");
