<?php
include_once('../database.php');
$id = $_POST["id"];
$proce=$_POST["proceso"];
$materia=$_POST["materia"];
$cantidad=$_POST["cantidad"];



$sql = "UPDATE insumo SET id_procedimiento='$proce', id_materiaprima='$materia', cantidad_insumos='$cantidad'
        WHERE id_insumo=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
