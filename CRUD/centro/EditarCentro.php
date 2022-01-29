<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$name = $_POST["name"];
$address = $_POST["address"];

$sql = "UPDATE centro SET name='$name', address='$address' WHERE id_centro=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
