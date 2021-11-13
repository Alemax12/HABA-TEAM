<?php

  require 'database.php';
  $message = '';
echo $_POST['email'];
echo $_POST['firstname'];
echo $_POST['dob'];
$form = $_POST['dob'];
echo $form;
$date = DateTime::createFromformat('m/d/Y',$form);
$form_date=$date->format("Y-m-d");
echo $form_date;
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO cliente (nom_cliente, fecha_nac, email, contraseña,id_rol) VALUES (:firstname,$form_date, :email, :password,1)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':firstname', $_POST['firstname']);
    $stmt->bindParam(':email', $_POST['email']);
    //$stmt->bindParam(':dob', $_POST['dob']);
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $_POST['password']);
    

    if ($stmt->execute()) {
      $message = 'Successfully created new user';
      header("Location: ../");
    } else {
      $message = 'Sorry there must have been an issue creating your account';
      header("Location: ../");
    }
  }
  ?> 