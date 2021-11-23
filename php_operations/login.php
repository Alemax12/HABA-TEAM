<?php
echo $_POST['options'];
session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: ../index.html');
}
require 'database.php';
$tipo = '';
$query = '';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
  if ($_POST['options'] == 'cliente') {
    
    $tipo = 'id_cliente';
    $query = 'SELECT ' . $tipo . ', id_rol , email, contraseña FROM cliente WHERE email = :email';
  } else {
    $tipo = 'id_empleado';
    $query = 'SELECT ' . $tipo . ', id_rol , email, contraseña FROM empleado WHERE email = :email';
  }
  $records = $conn->prepare($query);
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  if (count($results) > 0 && $_POST['password'] == $results['contraseña']) {
    $_SESSION['user_id'] = $results['id_cliente'];
    $_SESSION['user_rol'] = $results['id_rol'];
    header("Location: ../");
  } else {
    header("Location: ../ViewLogin.php?ress=1");
  }
}
echo $_POST['password'];
echo $results['contraseña'];
