<?php

ob_start();


$host = 'localhost';  
$dbname = 'merendero1'; 
$username = 'merendero';  
$password = '2345';  


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}


$queryAsistentes = "SELECT * FROM asistentes";
$statementAsistentes = $pdo->prepare($queryAsistentes);
$statementAsistentes->execute();
$asistentes = $statementAsistentes->fetchAll(PDO::FETCH_ASSOC);


$queryEtiquetas = "SELECT * FROM etiquetas";
$statementEtiquetas = $pdo->prepare($queryEtiquetas);
$statementEtiquetas->execute();
$etiquetas = $statementEtiquetas->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistentes </title>
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
            padding: 15px;
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
            left: 15px;
            top: 15px;
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

        .view-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1E90FF; 
            color: #ffffff; 
            border: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .view-button:hover {
            background-color: #4682b4; 
            transform: scale(1.05);
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
    </div>

    <div class="container">
        <h1>Lista de Asistentes</h1>
    <table>
        <thead>
            <tr>

                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>DNI</th>
                <th>Género</th>
                <th>Dirección</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asistentes as $asistente): ?>
            <tr>

                <td><?php echo htmlspecialchars($asistente['nombre']); ?></td>
                <td><?php echo htmlspecialchars($asistente['apellido']); ?></td>
                <td><?php echo htmlspecialchars($asistente['edad']); ?></td>
                <td><?php echo htmlspecialchars($asistente['dni']); ?></td>
                <td><?php echo htmlspecialchars($asistente['genero']); ?></td>
                <td><?php echo htmlspecialchars($asistente['direccion']); ?></td>

            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
       
  
</div>

</body>
</html>

<?php

$content = ob_get_clean();


echo $content;
?>
