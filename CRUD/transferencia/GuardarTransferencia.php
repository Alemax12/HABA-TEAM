<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$centro=$_POST["emp"];
$pet = $_POST["cli"];
$date = $_POST["date"];


$sql = "INSERT INTO transferencia values (NULL, '$pet', '$centro', '$date')";  

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();