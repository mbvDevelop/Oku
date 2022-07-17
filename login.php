
<?php

session_start();
require 'conexion.php';

$redirectToLogin = 'Location: ';
$msgErrorLogin = '?error=';

  if (isset($_SESSION['user_id'])) {
    $redirectToLoguin= "login-form.php";
  }

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password, rol FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    if (is_countable($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      $_SESSION['user_rol'] = $results['rol'];
      $redirectToLogin .= 'home.php';
    } else {
        $msgErrorLogin .= urlencode('Credenciales incorrectas');
        $redirectToLogin .= 'login-form.php'.$msgErrorLogin;
    }
  }
  header($redirectToLogin);
?>
