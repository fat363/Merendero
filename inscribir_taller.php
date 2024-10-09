<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merendero1";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $correoelectronico = $_POST['correoelectronico'];
    $taller = $_POST['taller'];

    
    $sql = "INSERT INTO inscripcionesTalleres (nombre, correoelectronico, taller) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        echo "Error en la preparación de la consulta: " . $conn->error;
    } else {
        $stmt->bind_param('sss', $nombre, $correoelectronico, $taller);

        if ($stmt->execute()) {
            echo "Inscripción realizada con éxito.";
        } else {
            echo "Error al realizar la inscripción: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
