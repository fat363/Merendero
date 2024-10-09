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
$curso = $_POST['curso'];


$sql = "INSERT INTO inscripcionesCurso (nombre, correoelectronico, curso) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    echo "Error en la preparación de la consulta: " . $conn->error;
    exit();
}

$stmt->bind_param("sss", $nombre, $correoelectronico, $curso);

if ($stmt->execute()) {
    echo "Inscripción exitosa";
} else {
    echo "Error al inscribirse: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
