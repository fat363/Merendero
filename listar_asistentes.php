<?php

ob_start();


$host = 'localhost';  
$dbname = 'c6merendero1';  
$username = 'merendero';  
$password = '2345';  


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}


$query = "SELECT * FROM asistentes"; 
$statement = $pdo->prepare($query);
$statement->execute();
$asistentes = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistentes</title>
    <style>
        
        header {
            background-color: #f9c74f; 
            padding: 10px 0;
            color: #fff; 
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }

        nav ul li a {
            color: #000; 
            text-decoration: none;
            font-weight: bold;
        }

        nav ul li a:hover {
            text-decoration: underline;
        }

        
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #000; 
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f9c74f; 
            color: #000; 
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f9c74f; 
            color: #000; 
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }

        .btn:hover {
            background-color: #f9844a; 
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Lista de Asistentes</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="formulario.php">Formulario</a></li>
                <li><a href="sobrenosotros.php">Sobre Nosotros</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="iniciodesesion.php">Inicio de sesión</a></li>
            </ul>
        </nav>
    </div>
</header>


<div class="container">
   
    <table>
        <thead>
            <tr>
                <th>id_asistente</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>DNI</th>
                <th>Género</th>
                <th>Dirección</th>
                <th>Talla de Ropa</th>
                <th>Talla de Calzado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asistentes as $asistente): ?>
            <tr>
                <td><?php echo htmlspecialchars($asistente['id_asistente']); ?></td>
                <td><?php echo htmlspecialchars($asistente['nombre']); ?></td>
                <td><?php echo htmlspecialchars($asistente['apellido']); ?></td>
                <td><?php echo htmlspecialchars($asistente['edad']); ?></td>
                <td><?php echo htmlspecialchars($asistente['dni']); ?></td>
                <td><?php echo htmlspecialchars($asistente['genero']); ?></td>
                <td><?php echo htmlspecialchars($asistente['direccion']); ?></td>
                <td><?php echo htmlspecialchars($asistente['tallaRopa']); ?></td>
                <td><?php echo htmlspecialchars($asistente['tallaCalzado']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a class="btn" href="formulario.php">Volver al Formulario</a> 
</div>

</body>
</html>

<?php

$content = ob_get_clean();


echo $content;
?>
