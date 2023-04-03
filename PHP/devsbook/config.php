<?php
session_start();
$base = '(YOUR_BASE_DIRECTORY)';
$db_host = 'localhost';
$db_name = 'DB_NAME';
$db_user = 'DB_USER';
$db_pass = 'DB_PASSWORD';

$pdo = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_pass);


?>
