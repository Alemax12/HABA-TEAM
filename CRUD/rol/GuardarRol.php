<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$nom = $_POST["name"];


$sql = "INSERT INTO rol values ('$id', '$nom');";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();