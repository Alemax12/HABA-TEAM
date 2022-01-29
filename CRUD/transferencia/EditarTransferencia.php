<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$centro=$_POST["emp"];
$pet = $_POST["cli"];
$date = $_POST["date"];


$sql = "UPDATE transferencia SET id_mascota='$pet', id_centro='$centro', fecha_transferencia='$date'
        WHERE id_transferencia=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
