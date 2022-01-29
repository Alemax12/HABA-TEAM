<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];

$sql = "DELETE FROM adopcion WHERE id_usuario=$id";
$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$sql = "DELETE FROM interaccion WHERE id_usuario=$id";
$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$sql = "DELETE FROM usuario WHERE id_usuario=$id";
$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$conexion->close();
