<?php

$host = 'localhost'; 
$dbname = 'c6merendero1';  
$username = '';  

try {
   
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_asistente = htmlspecialchars($_POST['id_asistente']);
        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $edad = htmlspecialchars($_POST['edad']);
        $dni = htmlspecialchars($_POST['dni']);
        $genero = htmlspecialchars($_POST['genero']);
        $direccion = htmlspecialchars($_POST['direccion']);
        $tallaropa = htmlspecialchars($_POST['tallaropa']);
        $tallacalzado = htmlspecialchars($_POST['tallacalzado']);

       
        $sql = "INSERT INTO asistentes (nombre, apellido, edad, dni, genero, direccion, tallaRopa, tallaCalzado)
                VALUES (:id_asistente,:nombre, :apellido, :edad, :dni, :genero, :direccion, :tallaRopa, :tallaCalzado)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id_asistente' => $id_asistente,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':edad' => $edad,
            ':dni' => $dni,
            ':genero' => $genero,
            ':direccion' => $direccion,
            ':tallaropa' => $tallaropa,
            ':tallacalzado' => $tallacalzado
        ]);

      
        header('Location: listar_asistentes.php');
        exit();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
