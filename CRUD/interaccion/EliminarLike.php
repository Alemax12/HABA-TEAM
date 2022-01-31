<?php
include_once '../../php_operations/databaseli.php';
$pet = $_POST["pet"];
$user = $_POST["user"];

$sql = "DELETE FROM interaccion WHERE id_mascota=$pet AND id_usuario=$user";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
$conexion->close();
