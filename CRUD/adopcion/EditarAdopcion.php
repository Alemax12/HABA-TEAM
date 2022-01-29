<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$user=$_POST["emp"];
$pet = $_POST["cli"];
$date = $_POST["date"];


$sql = "UPDATE adopcion SET id_mascota='$pet', id_usuario='$user', fecha_adopcion='$date'
        WHERE id_adopcion=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
