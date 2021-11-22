<?php
include_once('../database.php');
$id = $_POST["id"];

$sql = "SELECT * FROM contrato AS c  
        INNER JOIN empleado AS e ON (c.id_empleado = e.id_empleado)
        INNER JOIN sede AS s ON (c.id_sede = s.id_sede)
        INNER JOIN rol AS r ON (c.id_rol = r.id_rol)
        ORDER BY id_contrato";

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$listado = array();
while ($fila = $resultado->fetch_assoc()) {
    $listado[] = $fila;
}



echo json_encode($listado[0]);
$conexion->close();
