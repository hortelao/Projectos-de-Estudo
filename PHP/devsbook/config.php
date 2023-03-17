<?php
session_start();
$base = 'http://localhost/Projetos-de-Estudo/PHP/devsbook';
$db_host = 'localhost';
$db_name = 'devsbook';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);


?>