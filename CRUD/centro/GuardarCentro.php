<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$name = $_POST["name"];
$address = $_POST["address"];

$sql = "INSERT INTO centro values (NULL,'$name', '$address');";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();