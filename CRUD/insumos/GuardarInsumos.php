<?php
include_once('../database.php');
$id = $_POST["id"];
$proce=$_POST["proceso"];
$materia=$_POST["materia"];
$cantidad=$_POST["cantidad"];


$sql = "INSERT INTO insumo values (NULL, '$proce', '$materia', '$cantidad');";  

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();