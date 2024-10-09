<?php

header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merendero1";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


$sql = "
    SELECT clasificacion, descripcion_comida, fecha_entrega 
    FROM menu 
    WHERE (clasificacion, fecha_entrega) IN (
        SELECT clasificacion, MAX(fecha_entrega) 
        FROM menu 
        GROUP BY clasificacion
    )
    ORDER BY FIELD(clasificacion, 'Desayuno', 'Almuerzo', 'Merienda', 'Cena')
";

$menu_result = $conn->query($sql);
$menu_items = [];
if ($menu_result->num_rows > 0) {
    while ($row = $menu_result->fetch_assoc()) {
        $menu_items[$row['clasificacion']] = $row;
    }
} else {
    $menu_items = []; 
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú - Merendero Rayitos de Sol</title>
    <style>
       
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        
        header {
            background-color: #f9c74f;
            padding: 20px 0;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 0 0px 1px rgba(0, 0, 0, 0.1);
        }

        .header-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px; 
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
            gap: 25px;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            padding: 15px 15px; 
            border-radius: 4px; 
            transition: background-color 0.3s, color 0.3s; 
        }

        nav ul li a:hover {
            background-color: #fbc02d;
            color: #fff; 
        }

    
        .content {
            flex: 1;
            padding: 20px;
        }

        .menu {
            background-color: #fff;
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 900px;
        }

        .menu h2 {
            color: #f9c74f;
            text-align: center;
            margin-bottom: 20px;
        }

        .menu-item-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .menu-item {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 45%; 
            box-sizing: border-box;
            transition: box-shadow 0.3s;
        }

        .menu-item h3 {
            color: #333;
            margin-top: 0;
            font-size: 1.2em;
        }

        .menu-item p {
            margin: 5px 0 0;
            font-size: 0.95em;
        }

        .menu-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

    
        footer {
            background-color: #f9c74f;
            color: #333;
            text-align: center;
            padding: 15px 0;
            width: 100%;
            position: relative;
            bottom: 0;
        }
    </style>

<body>
    <header>
        <div class="header-logo">
            <img src="https://scontent.fcor15-1.fna.fbcdn.net/v/t39.30808-6/310461675_460193082874203_525827847567150528_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=hAuL33mKQMkQ7kNvgEXZsb6&_nc_ht=scontent.fcor15-1.fna&_nc_gid=AtGyjZFkrj3Un2reIqNFNSo&oh=00_AYBfgiScOxLfYeI7gs6Sa2RVGDgbx0pC1as-wSQHObyUoA&oe=6700C798">
            <h1>Merendero Rayitos de Sol</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="formulario.php">Formulario</a></li>
                <li><a href="sobrenosotros.php">Sobre Nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="inscripciones.php">Inscripciones</a></li>
                <li><a href="iniciodesesion.php">Inicio de sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="content">
        <div class="menu">
            <h2>Menú del Día</h2>
            <div class="menu-item-container">
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <div class="menu-item">
                            <h3><?php echo ucfirst($item['clasificacion']); ?></h3>
                            <p><strong>Descripción:</strong> <?php echo $item['descripcion_comida']; ?></p>
                            <p><strong>Fecha de Entrega:</strong> <?php echo $item['fecha_entrega']; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No hay datos de menú disponibles.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Merendero Rayitos de Sol</p>
    </footer>
</body>
</html>
