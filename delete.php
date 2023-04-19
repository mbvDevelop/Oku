<?php
session_start();
 include "conexion.php";

 if (isset($_GET['id'])){
    $userID = $_GET['id'];
    $query = $conn->prepare("DELETE FROM users WHERE id='$userID'");
    $query->execute();
    echo'deleted';
    session_unset();
    session_destroy();
    header('Location: index.html');

 }
 else
 {
     echo'no id'; 
 }

?>

