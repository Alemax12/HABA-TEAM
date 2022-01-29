<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];

$sql = "DELETE FROM centro WHERE id_centro=$id";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$conexion->close();
