<?php

$contraseña = "0000";
$usuario = "root";
$dB = "php_login";
try{
	$conn = new PDO('mysql:host=localhost;dbname=' . $dB, $usuario, $contraseña);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
?>