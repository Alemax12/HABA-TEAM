<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];

$sql = "DELETE FROM mascota WHERE id_mascota=$id";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$conexion->close();
