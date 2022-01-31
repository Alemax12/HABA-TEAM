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

$sql = "UPDATE mascota SET name='$name', weight='$peso', status='$estado', specie='$especie', race='$raza' WHERE id_mascota=$id";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();
