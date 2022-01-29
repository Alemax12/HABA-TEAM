<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$user=$_POST["emp"];
$pet = $_POST["cli"];
$date = $_POST["date"];
$comment = $_POST["comment"];
$like = $_POST["like"];


$sql = "UPDATE interaccion SET id_mascota='$pet', id_usuario='$user', fecha_interaccion='$date', megusta='$like', comentarios='$comment'
        WHERE id_interaccion=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
