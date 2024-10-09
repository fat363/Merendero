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
    $edad = $_POST['edad'];
    $dni = $_POST['dni'];
    $genero = $_POST['genero'];
    $direccion = $_POST['direccion'];

   
    $sql = "SELECT * FROM asistentes WHERE dni = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $dni);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error_message = 'El DNI ya está registrado.';
    } else {
        
        $sql = "INSERT INTO asistentes (nombre, apellido, edad, dni, genero, direccion) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssisss', $nombre, $apellido, $edad, $dni, $genero, $direccion);

        if ($stmt->execute()) {
            $success_message = 'Asistente registrado con éxito.';
           
            header("Location: grupo_familiar.php");
            exit();
        } else {
            $error_message = 'Error al registrar el asistente: ' . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Asistentes</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: black;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #f9c74f;
            padding: 20px;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .header-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .header-logo img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            color: #fff;
        }

        nav {
            background-color: #f9c74f;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav ul li a:hover {
            background-color: #fbc02d;
            color: #fff;
        }

        .container {
            flex: 1;
            width: 90%;
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        .form-section {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        .form-section h2 {
            margin-top: 0;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"], input[type="number"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #f9c74f;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #fbc02d;
        }

        .message {
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 4px;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        footer {
            background-color: #f9c74f;
            color: #333;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: relative;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-logo">
            <img src="https://scontent.fcor15-1.fna.fbcdn.net/v/t39.30808-6/310461675_460193082874203_525827847567150528_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=hAuL33mKQMkQ7kNvgEXZsb6&_nc_ht=scontent.fcor15-1.fna&_nc_gid=AtGyjZFkrj3Un2reIqNFNSo&oh=00_AYBfgiScOxLfYeI7gs6Sa2RVGDgbx0pC1as-wSQHObyUoA&oe=6700C798">
            <h1>Merendero Rayitos de Sol</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="sobrenosotros.php">Sobre Nosotros</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="inscripciones.php">Inscripciones</a></li>
                <li><a href="iniciodesesion.php">Inicio de sesión</a></li>
            </ul>
        </nav>
    </header>
    
    <div class="container">
        <section class="form-section">
            <h2>Formulario de Registro</h2>
            <?php if (!empty($error_message)) echo "<p class='message error'>$error_message</p>"; ?>
            <?php if (!empty($success_message)) echo "<p class='message success'>$success_message</p>"; ?>
            <form action="" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" required>

                <label for="edad">Edad:</label>
                <input type="number" id="edad" name="edad" required>

                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" required>

                <label for="genero">Género:</label>
                <select id="genero" name="genero" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required>

                <button type="submit">Registrar</button>
            </form>
        </section>
    </div>

    <footer>
       <p>&copy; 2024 Merendero Rayitos de Sol. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
