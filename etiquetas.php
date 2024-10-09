<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merendero1";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$mensaje = '';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
   
    $tipo = $_POST['tipo'];

   
    if (!empty($tipo)) {
        
        $sql = "INSERT INTO etiquetas (tipo) VALUES (?)";

        
        if ($stmt = $conn->prepare($sql)) {
         
            $stmt->bind_param("s", $tipo);

           
            if ($stmt->execute()) {
                $mensaje = "Etiqueta registrada correctamente.";
            } else {
                $mensaje = "Error al registrar la etiqueta: " . $stmt->error;
            }

            // Cerrar la declaración
            $stmt->close();
        } else {
            $mensaje = "Error en la preparación de la consulta: " . $conn->error;
        }
    } else {
        $mensaje = "Por favor, seleccione un tipo.";
    }
}


$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Etiquetas</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center; 
            min-height: 100vh;
        }

        .navbar {
            width: 100%;
            background-color: #ffc107; 
            padding: 25px;
            color: #ffffff;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .navbar .btn-back {
            position: absolute;
            left: 10px;
            top: 10px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
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

        .container {
            width: 90%;
            max-width: 500px;
            background-color: #ffffff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            padding: 30px;
            box-sizing: border-box;
            text-align: center; /* Centrar el contenido */
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center; 
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
            color: #666;
        }
        input, select {
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            width: 100%; 
            max-width: 400px; 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .submit-button {
            padding: 12px 24px;
            background-color: #f9c74f;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit-button:hover {
            background-color: #f9844a;
        }
        .message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 6px;
            font-size: 16px;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
        
        .button:hover {
            background-color: #f9844a;
        }
    </style>
</head>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Etiquetas</title>
</head>
<body>

        <div class="navbar">
            <a href="grupo_familiar.php">Volver</a> 
        </div>


    <h1>Registrar Etiquetas</h1>
    
    <div class="container">
 
        <?php if (!empty($mensaje)): ?>
            <div class="message <?php echo strpos($mensaje, 'Error') === false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <form action="" method="post">
            <label for="tipo">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="">Seleccione una opción</option>
                <option value="zapatillas">Zapatillas</option>
                <option value="pantalón">Pantalón</option>
                <option value="remeras">Remeras</option>
                <option value="buzo">Buzo</option>
                <option value="camperas">Camperas</option>
            </select>

            <button type="submit" name="register" class="submit-button">Registrar</button>
        </form>
    </div>
</body>
</html>