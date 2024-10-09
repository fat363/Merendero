<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripciones</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #f9c74f;
            padding: 10px 0;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header-logo {
            display: flex;
            align-items: center;
            margin-bottom: 10px; 
        }

        .header-logo img {
            height: 50px; 
            border-radius: 50%; 
            margin-right: 10px; 
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            text-align: center;
        }

        nav {
            width: 100%;
            background-color: #f9c74f;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin: 0 10px;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
            padding: 10px  15px;
            border-radius: 4px; 
            transition: background-color 0.3s; 
        }

        nav ul li a:hover {
            background-color: #f7b52a;
            color: #fff; 
        }

        .container {
            flex: 5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 10px;
        }

        .btn {
            display: block;
            width: 200px;
            padding: 15px;
            margin: 10px auto;
            font-size: 16px;
            text-decoration: none;
            color: #000;
            background-color: #f9c74f; 
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #f7b52a; 
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
                <li><a href="formulario.php">Formulario</a></li>
                <li><a href="sobrenosotros.php">Sobre Nosotros</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="iniciodesesion.php">Inicio de sesión</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <a href="inscripcionesCurso.php" class="btn">Inscripciones a Cursos</a>
        <a href="inscripcionesTalleres.php" class="btn">Inscripciones a Talleres</a>
    </div>
</body>
</html>
