<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: ../index.html');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id_cliente, id_rol , email, contraseña FROM cliente WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (count($results) > 0 && $_POST['password']==$results['contraseña']) {
      $_SESSION['user_id'] = $results['id_cliente'];
      $_SESSION['user_rol'] = $results['id_rol'];
      header("Location: ../");
    } else {
      header("Location: ../ViewLogin.php?ress=1");
    }
  }
  echo $_POST['password'];
echo $results['contraseña'];
?>

