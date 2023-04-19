<?php 
require 'session.php';
    session_start();
    $message = '';
        $sql = "UPDATE users SET name = :name, foto = :foto WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $userName = $_POST['name'];
        $stmt->bindParam(':name', $userName);
        $stmt->bindParam(':id', $_POST['id']);
    
        $nombre_img = $_FILES['imagen']['name'];
        print($nombre_img);        
        if(!empty($nombre_img)){
            $directorio = __DIR__.'/images/';
            move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio.$nombre_img);
            $stmt -> bindParam(':foto', $nombre_img);
        }else{
            $sql = "SELECT foto FROM users WHERE id = :id";
            $stmt1 = $conn->prepare($sql);
            $stmt1->bindParam(':id', $_POST['id']);
            $stmt1->execute();
            $results = $stmt1->fetch(PDO::FETCH_ASSOC);
            $stmt -> bindParam(':foto', $results['foto']);
        }
    
        if ($stmt->execute()) {
          $message = 'Successfully update your user';
        } else {
          $message = 'Sorry there must have been an issue updating your account';
        }
      

      $_SESSION['message'] = $message;
      header('Location: settings.php');
?>