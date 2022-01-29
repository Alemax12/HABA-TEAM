<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$user=$_POST["emp"];
$pet = $_POST["cli"];
$date = $_POST["date"];
$comment = $_POST["comment"];
$like = $_POST["like"];

$sql = "INSERT INTO interaccion values (NULL, '$pet', '$user', '$comment', '$like', '$date')";  

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();