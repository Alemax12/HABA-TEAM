<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$name = $_POST["name"];
$peso = $_POST["peso"];
$estado = $_POST["estado"];
$especie = $_POST["especie"];
$raza = $_POST["raza"];
$centro = $_POST["centro"];
$date=date('Y-m-d');

$sql = "INSERT INTO mascota values (NULL,'$name', '$peso', '$estado', '$especie', '$raza')";
$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$sql = "INSERT INTO transferencia values (NULL,'$conexion->insert_id', '$centro', '$date')";
$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();
