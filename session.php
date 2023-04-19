
<?php
  session_start();
  require 'conexion.php';
 
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, email, password, foto, rol FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
 
    $user = null;
 
    if (count($results) > 0) {      
      
      $user = $results;
      $id = $_SESSION['user_id'];
      $name = $user['name'];
      $foto = ($user['foto'] != 'null') ? $user['foto'] : "background.jpg";
      $_SESSION['user_rol'] = $user['rol'];
    }
  }
  
?>