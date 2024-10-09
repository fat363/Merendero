<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    
    $_SESSION['loggedin'] = true; 
    $_SESSION['username'] = $username; 
    
    
    header("Location: botones.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Merendero Rayitos de Sol</title>
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

        header .title-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px; 
        }

        header .title-container img {
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
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        nav ul li {
            margin: 0 10px;
        }

        nav ul li a {
            display: block;
            padding: 10px 15px;
            color: #333; 
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s;
        }

        nav ul li a:hover {
            background-color: #f7b52a;
            color: #fff; 
        }

        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-box h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #f9c74f; 
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #f7b52a; 
        }

        .error-message {
            color: #f44336;
            margin-top: 15px;
            font-size: 0.875rem;
        }

        footer {
            background-color: #f9c74f;
            color: black;
            text-align: center;
            padding: 10px 0;
        }

        @media (max-width: 600px) {
            header h1 {
                font-size: 1.5rem;
            }

            .login-box {
                padding: 20px;
            }

            .form-group input, .form-group button {
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="title-container">
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
            <li><a href="inscripciones.php">Inscripciones</a></li>
        </ul>
    </nav>
</header>

    <section id="login-container" class="login-container">
        <div class="login-box">
            <h2>Iniciar sesión</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="form-group">
                    <label for="username">Usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="login">Ingresar</button>
                </div>
                <?php if (isset($_GET['error'])): ?>
                    <div class="error-message">Credenciales incorrectas. Inténtalo de nuevo.</div>
                <?php endif; ?>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Merendero Rayitos de Sol. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
