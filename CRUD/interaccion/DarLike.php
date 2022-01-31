<?php
include_once '../../php_operations/databaseli.php';
$pet = $_POST["pet"];
$user = $_POST["user"];
$date=date('Y-m-d');

$sql = "INSERT INTO interaccion values (NULL, '$pet', '$user', null, '1', '$date')";  

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();