<?php
session_start();

if (isset($_SESSION['user_id'])) {
  header('Location: ../index.html');
}
require 'database.php';
$tipoid = '';
$tiponom = '';
$query = '';
if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $query = 'SELECT * FROM usuario AS u INNER JOIN rol AS r ON (u.id_rol = r.id_rol) WHERE email = :email';
}
$records = $conn->prepare($query);
$records->bindParam(':email', $_POST['email']);
$records->execute();
$results = $records->fetch(PDO::FETCH_ASSOC);
try {
  if (isset($results) > 0 && $_POST['password'] == $results['contraseña']) {
    $_SESSION['user_rol'] = $results['id_rol'];
    $_SESSION['user_id'] = $results['id_usuario'];
    $_SESSION['user_name'] = $results['nombre'];
    $_SESSION['user_rol_t'] = $results['descripcion'];
    header("Location: ../");
  } else {
    header("Location: ../ViewLogin.php?ress=1");
  }
} catch (PDOException $e) {
  header("Location: ../ViewLogin.php?ress=1");
}
