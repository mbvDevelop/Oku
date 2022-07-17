<?php 
    require('conexion.php');
    $sql = "INSERT INTO notifications (idUsuario, title, subtitle, state) 
    VALUES(:idUsuario, :title, :subtitle, :state)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':idUsuario', $_POST['users']);
    $stmt->bindParam(':title', $_POST['title']);
    $stmt->bindParam(':subtitle', $_POST['subtitle']);
    $state = "unread";
    $stmt->bindParam(':state', $state);

    $stmt->execute();
    header('Location: notificationsAdmin.php');
?>