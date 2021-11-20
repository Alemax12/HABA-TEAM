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


$sql = "INSERT INTO contrato values (NULL, '$emp', '$sal', '$date_ini', '$date_fin', '$sede', '$rol');";  

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);

$conexion->close();