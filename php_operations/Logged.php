<?php
$respuesta=false;
session_start();
if (isset($_SESSION['user_id'])) {
  $respuesta="yes";
} else {
  $respuesta="no";
}
$listado = array("respuesta"=>$respuesta,"wtfa"=>123);
echo json_encode($listado)
?>
