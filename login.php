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
    
    $descripcion_comida = $_POST['descripcion_comida'];
    $dia_semana = $_POST['dia_semana'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $clasificacion = $_POST['clasificacion'];

   
    if (!DateTime::createFromFormat('Y-m-d', $fecha_entrega)) {
        $error_message = "Fecha de entrega no válida.";
    } else {
       
        $sql = "INSERT INTO menu (descripcion_comida, dia_semana, fecha_entrega, clasificacion) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            $error_message = "Error en la preparación de la consulta: " . $conn->error;
        } else {
            $stmt->bind_param('ssss', $descripcion_comida, $dia_semana, $fecha_entrega, $clasificacion);

            if ($stmt->execute()) {
                $success_message = "Menú actualizado con éxito.";
            } else {
                $error_message = "Error al actualizar el menú: " . $stmt->error;
            }

            $stmt->close();
        }
    }
}


$sql = "SELECT descripcion_comida, dia_semana, fecha_entrega, clasificacion FROM menu";
$result = $conn->query($sql);

$menu_items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Menú</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        
        nav {
            background-color: #f9c74f;
            padding: 15px;
            width: 100%;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: background-color 0.3s, color 0.3s;
        }

        nav a:hover {
            background-color: #f0f0f0;
            color: #000;
        }

        h1 {
            color: white;
            margin: 0;
            flex-grow: 1;
            text-align: center;
            font-size: 24px;
        }

        .container {
            margin-top: 80px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 350px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="date"], select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        button {
            width: 100%;
            background-color: #f9c74f;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #f7b42c;
        }

        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            font-size: 14px;
            text-align: center;
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

        .menu-list {
            margin-top: 20px;
        }

        .menu-list table {
            width: 100%;
            border-collapse: collapse;
        }

        .menu-list th, .menu-list td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .menu-list th {
            background-color: #f9c74f;
            color: white;
        }

        .menu-list tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .navbar {
            width: 100%;
            background-color: #f9c74f; 
            padding: 25px; 
            color: #ffffff;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: center; 
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        .navbar h1 {
            margin: 0;
            font-size: 2em; 
            font-weight: bold;
            position: absolute; 
            left: 50%;
            transform: translateX(-50%);
        }

        .navbar a {
            position: absolute;
            left: 15px; 
            color: #333; 
            text-decoration: none;
            padding: 10px 20px;
            background-color: #f9c74f; 
            border-radius: 25px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease; 
        }

        .navbar a:hover {
            background-color: #f9844a; 
        }

    </style>
</head>
<body>
    <div class="navbar">
        <a href="botones.php">Volver</a>
    
        <h1>Actualizar Menú</h1>
    </nav>
    </div>

    <div class="container">
        <?php if (!empty($success_message)): ?>
            <div class="message success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if (!empty($error_message)): ?>
            <div class="message error"><?php echo $error_message; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="descripcion_comida">Descripción de la Comida:</label>
            <input type="text" id="descripcion_comida" name="descripcion_comida" required>

            <label for="dia_semana">Día de la Semana:</label>
            <select id="dia_semana" name="dia_semana" required>
                <option value="Lunes">Lunes</option>
                <option value="Martes">Martes</option>
                <option value="Miércoles">Miércoles</option>
                <option value="Jueves">Jueves</option>
                <option value="Viernes">Viernes</option>
                <option value="Sábado">Sábado</option>
                <option value="Domingo">Domingo</option>
            </select>

            <label for="fecha_entrega">Fecha de Entrega:</label>
            <input type="date" id="fecha_entrega" name="fecha_entrega" required>

            <label for="clasificacion">Clasificación:</label>
            <select id="clasificacion" name="clasificacion" required>
                <option value="Desayuno">Desayuno</option>
                <option value="Almuerzo">Almuerzo</option>
                <option value="Merienda">Merienda</option>
                <option value="Cena">Cena</option>
            </select>

            <button type="submit">Actualizar Menú</button>
        </form>

     
    </div>
</body>
</html>
