<?php
session_start();
include "conexion.php";
// comprobar si se ha enviado un id
if (!empty($_POST['id'])) {
    $id = $_POST['id'];

    // obtener la información del archivo
    $query = "SELECT * FROM files WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$id]);

    $file = $statement->fetch(PDO::FETCH_ASSOC);

    // eliminar el archivo del sistema de archivos
    unlink($file['path']);

    // eliminar la entrada de la base de datos
    $query = "DELETE FROM files WHERE id = ?";
    $statement = $conn->prepare($query);
    $statement->execute([$id]);

    // redirigir al usuario de vuelta a la página de subida de archivos
    header("Location: library.php");
    exit();
} else {
    // si no se envió un id, redirigir al usuario de vuelta a la página de subida de archivos
    header("Location: library.php");
    exit();
}