<?php

$server = 'localhost:3306';
$username = 'root';
$password = '';
$database = 'dbadopcion';
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
?>
