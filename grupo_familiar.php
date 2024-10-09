<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merendero1";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$success_message = "";
$error_message = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $tipo_flia = $_POST['tipo_flia'];
    $cantidad_de_integrantes = $_POST['cantidad_de_integrantes'];

    $id_asistente = $_GET['id_asistente'];

    
    $sql = "INSERT INTO grupo_familiar (nombre, apellido, genero, fecha_nacimiento, tipo_flia, cantidad_de_integrantes, id_asistente)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $nombre, $apellido, $genero, $fecha_nacimiento, $tipo_flia, $cantidad_de_integrantes, $id_asistente);

    if ($stmt->execute()) {
        $success_message = "Grupo familiar registrado exitosamente.";
    } else {
        $error_message = "Error al registrar el grupo familiar: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Grupo Familiar</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #ffc107; 
            padding: 15px;
            color: #ffffff;
            text-align: center;
            position: relative;
        }
        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }
        .navbar .btn-back {
            position: absolute;
            left: 15px;
            top: 15px;
            background-color: #f9c74f;
            color: black;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
        }
        .navbar .btn-back:hover {
            background-color: #fdd835;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group input[type="radio"] {
            margin-right: 10px;
        }
        .form-check {
            margin-bottom: 10px;
        }
        .btn-custom {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .btn-register {
            background-color: #ffc107; 
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            margin-top: 10px;
        }
        .btn-register:hover {
            background-color: #e0a800;
        }
        .message {
            margin: 20px 0;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php" class="btn-back">Volver</a>
        <h1>Registrar Grupo Familiar</h1>
    </div>
    <div class="container">
        <h2>Formulario de Registro</h2>
        <?php if ($success_message): ?>
            <div class="message success">
                <?php echo htmlspecialchars($success_message); ?>
            </div>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <div class="message error">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="genero">Género:</label>
                <select id="genero" name="genero" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
                <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>
            <div class="form-group">
                <label for="tipo_flia">Tipo de Familiar:</label>
                <select id="tipo_flia" name="tipo_flia" required>
                    <option value="mama">Mamá</option>
                    <option value="papa">Papá</option>
                    <option value="tutor">Tutor</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cantidad_de_integrantes">Cantidad de Integrantes:</label>
                <select id="cantidad_de_integrantes" name="cantidad_de_integrantes" required>
                    <option value="1-3">1-3</option>
                    <option value="3-6">3-6</option>
                    <option value="+6">Más de 6</option>
                </select>
            </div>

            <div style="text-align: center;">
                <button type="submit" class="btn-custom">Enviar</button>
                <a href="etiquetas.php" class="btn-register">Registrar Etiquetas</a>
            </div>
        </form>
    </div>
</body>
</html>
