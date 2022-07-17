<?php
    require('session.php');
    if(isset($_SESSION['user_id'])){
        $sql = "SELECT title, subtitle FROM notifications WHERE state = :state AND idUsuario = :idUsuario";
        $stmt = $conn->prepare($sql);
        $state = "unread";
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':idUsuario', $_SESSION['user_id']);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($results){
            $count = count($results);
            echo json_encode($count);
        }else{
            $count = 0;
            echo json_encode($count);
        }
    }
?>