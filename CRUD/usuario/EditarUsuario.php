<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$name = $_POST["name"];
$fec_nac = $_POST["fec_nac"];
$date=date("Y-m-d",strtotime($fec_nac)); 
$cel = $_POST["cel"];
$email = $_POST["email"];
$peso = $_POST["peso"];
$est = $_POST["est"];
$dir = $_POST["dir"];
$contra = $_POST["contra"];
$rol = $_POST["rol"];

$sql = "UPDATE usuario SET nombre='$name', fecha_nacimiento='$date', celular='$cel',
email='$email', peso='$peso', estatura='$est', direccion='$dir', contraseña='$contra',id_rol='$rol' WHERE id_usuario=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
