<?php
  require 'conexion.php';
  $redirectTo = 'Location: ';
  $msgError = '?error=';

  if (!empty($_POST['email']) && !empty($_POST['password'])  && !empty($_POST['name'])) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$results) {
        $sql = "INSERT INTO users (email, password,name, foto, rol) VALUES (:email, :password, :name, :foto, :rol)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':name', $_POST['name']);
        $rol = "user";
        $stmt->bindParam(':rol', $rol);
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password);
        $name_image = $_FILES['imagen']['name'];

        if(!empty($name_image)){
            $directorio = __DIR__.'/images/';
            move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$name_image);
            $stmt->bindParam(':foto', $name_image);
        }else{
            $name_image = "null";
            $stmt->bindParam(':foto', $name_image);
        }
        if ($stmt->execute()) {
        $msgError .= urlencode('Successfully created new user');
        $redirectTo .= 'register-form.php'.$msgError;
        } else {
            $msgError .= urlencode('Sorry there must have been an issue creating your account');
            $redirectTo .= 'register-form.php'.$msgError;
        }
      } else {
          $msgError .= urlencode('Sorry email already exists!');
          $redirectTo .= 'register-form.php'.$msgError;
      }
  }
  header($redirectTo);
?>