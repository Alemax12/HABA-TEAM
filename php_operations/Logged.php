<?php
$respuesta=false;
session_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_rol'])) {
  $respuesta="yes";
  $listado = array("respuesta"=>$respuesta,"user"=>$_SESSION['user_id'],"rol"=>$_SESSION['user_rol']);
} else {
  $respuesta="no";
  $listado = array("respuesta"=>$respuesta);
}

echo json_encode($listado)
?>
