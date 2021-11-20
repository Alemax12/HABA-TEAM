<?php
include_once('../database.php');
$id = $_POST["id"];
$emp=$_POST["emp"];
$sal = $_POST["sal"];
$fec_ini = $_POST["fec_ini"];
$date_ini=date("Y-m-d",strtotime($fec_ini));
$fec_fin = $_POST["fec_fin"];
$date_fin=date("Y-m-d",strtotime($fec_fin));
$sede=$_POST["sede"];
$rol=$_POST["rol"];


$sql = "UPDATE contrato SET salario='$sal', fecha_inicio='$date_ini', fecha_fin='$date_fin', id_sede='$sede', id_rol='$rol'
        WHERE id_contrato=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
