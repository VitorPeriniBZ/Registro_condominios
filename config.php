<?php 

error_reporting(E_ALL);
ini_set("display_errors",1 );

$dsn = "mysql:host=192.168.3.108; dbname=condominios";
$conf = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$conn = new PDO($dsn, "root", "root", $conf);