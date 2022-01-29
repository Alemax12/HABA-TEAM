<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$user = $_POST["emp"];
$pet = $_POST["cli"];
$date = $_POST["date"];

$sql = "INSERT INTO adopcion values (NULL, '$pet', '$user', '$date')";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$sql = "UPDATE mascota SET status='Adopted' WHERE id_mascota=$pet";
$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);


$conexion->close();
