<?php
include_once('../database.php');
$id = $_POST["id"];
$pai = $_POST["pai"];
$nom = $_POST["nom"];

/*,  fecha_nac='$date', celular='$cel',
email='$email', peso='$peso', estatura='$est', direccion='$dir', contraseña='$contra'*/

$sql = "UPDATE ciudad SET id_pais='$pai', nom_ciudad='$nom' WHERE id_cliente=$id";
echo $sql;

$resultado = $conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql);
        
$conexion->close();
