<?php
include_once('../database.php');
$id1 = $_POST["od"];

$sql = "SELECT * FROM insumo WHERE id_procedimiento='$id1' ";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
}



echo json_encode($listado[0]);
$conexion->close();
