<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Merendero Rayitos de Sol</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            align-items: center;
            justify-content: center;
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
            transform: translateX(-50%);
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

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 120px; 
            gap: 20px; 
        }

        .button-container a {
            text-decoration: none;
        }

        .button {
            display: inline-block;
            padding: 30px 25px;
            background-color: #ffab00;
            color: #fff;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: bold;
            text-transform: uppercase; 
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
        }

        .button:hover {
            background-color: #ff9800;
            transform: translateY(-3px); 
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="index.php">Volver</a> 
        <h1>Administrador</h1> 
    </div>

    <div class="button-container">
        <a href="ver_lista_asistentes.php" class="button">Ver lista de asistentes</a>
        <a href="login.php" class="button">Actualizar menú</a>
        <a href="ver_lista_etiquetas.php" class="button">Ver Etiquetas</a> 
        <a href="cursosytalleres.php" class="button">Cursos y talleres</a>
    </div>
</body>
</html>
