<?php
include_once '../../php_operations/databaseli.php';
$id = $_POST["id"];
$name = $_POST["name"];
$peso = $_POST["peso"];
$estado = $_POST["estado"];
$especie = $_POST["especie"];
$raza = $_POST["raza"];
$centro = $_POST["centro"];
$date = date('Y-m-d');

//Recuperar los datos del archivo
$nombre = $_FILES['txtImg']['name'];
$tmp = $_FILES['txtImg']['tmp_name'];
$folder = 'images';

//Movera el archivo del folder temporal a una nueva ruta
move_uploaded_file($tmp, $folder . '/' . $nombre);
//echo $nombre.'<br/>'.$tmp;

//Extraigo los bytes del archivo
$bytesArchivo = file_get_contents($folder . '/' . $nombre);

$sql = "INSERT mascota(name,weight,status,specie,race,picture_pet) VALUES(?,?,?,?,?,?)";
$stm = $conexion->prepare($sql);
$stm->bind_param('sdssss',$name, $peso, $estado, $especie, $raza, $bytesArchivo);
if ($stm->execute()) {
    $sql = "INSERT INTO transferencia values (NULL,'$conexion->insert_id', '$centro', '$date')";
    $resultado = $conexion->query($sql)
        or die(mysqli_errno($conexion) . " : "
            . mysqli_error($conexion) . " | Query=" . $sql);
}

/*
$sql = "INSERT INTO mascota values (NULL,'$name', '$peso', '$estado', '$especie', '$raza','$bytesArchivo')";
    $resultado = $conexion->query($sql)
        or die(mysqli_errno($conexion) . " : "
            . mysqli_error($conexion) . " | Query=" . $sql);
            */

$conexion->close();
