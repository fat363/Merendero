<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "c6merendero1";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$id_asistente = $_POST['id_asistente'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$dni = $_POST['dni'];
$genero = $_POST['genero'];
$direccion = $_POST['direccion'];
$tallaropa = $_POST['tallaropa'];
$tallacalzado = $_POST['tallacalzado'];


$sql = "INSERT INTO asistentes (id_asistente,nombre, apellido, edad, dni, genero, direccion, tallaRopa, tallaCalzado)
        VALUES ('$id_asistente','$nombre', '$apellido', $edad, '$dni', '$genero', '$direccion', '$tallaRopa', '$tallaCalzado')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo asistente registrado exitosamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
