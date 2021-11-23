<?php
session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: ../index.html');
}
require 'database.php';
$tipo = '';
$query = '';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
  if ($_POST['options'] == 'Cliente') {
    $tipo = 'id_cliente';
    $query = 'SELECT ' . $tipo . ', id_rol, email, contraseña FROM cliente WHERE email = :email';
  } else {
    $tipo = 'id_empleado';
    $query = 'SELECT ' . $tipo . ', id_rol, email, contraseña FROM empleado WHERE email = :email';
  }
  $records = $conn->prepare($query);
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  try {
    if (isset($results) > 0 && $_POST['password'] == $results['contraseña']) {
      $_SESSION['user_rol'] = $results['id_rol'];
      $_SESSION['user_id'] = $results[$tipo];
      header("Location: ../");
    } else {
      header("Location: ../ViewLogin.php?ress=1");
    }
  } catch (PDOException $e) {
    header("Location: ../ViewLogin.php?ress=1");
  }
}
