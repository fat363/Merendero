<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "merendero1"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$nombre = $_POST['nombre'];
$correoelectronico = $_POST['correoelectronico'];
$mensaje = $_POST['mensaje'];





$sql = "INSERT INTO notificaciones (nombre, correoelectronico, mensaje) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $correoelectronico, $mensaje);

if ($stmt->execute()) {
    echo "Mensaje enviado correctamente.";
} else {
    echo "Error: " . $stmt->error;
}
close();
?>
