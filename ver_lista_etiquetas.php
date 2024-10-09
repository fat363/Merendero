<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merendero1";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT tipo FROM etiquetas";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Lista de Etiquetas</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
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
        .navbar a {
            position: absolute;
            left: 15px; 
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
        .container {
            width: 90%;
            max-width: 800px;
            background-color: #ffffff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            padding: 30px;
            box-sizing: border-box;
            text-align: center;
            margin-top: 80px; 
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ffc107; 
            color: #ffffff;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="botones.php">Volver</a>
    </div>

    <div class="container">
        <h1>Lista de Etiquetas</h1>
        <table>
            <thead>
                <tr>
                    <th>Tipo</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['tipo']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="1">No hay etiquetas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
