<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Merendero Rayitos de Sol</title>
    <style>
        
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9; 
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
            width: 80%;
            margin: 0 auto;
        }

        #contact {
            flex: 1; 
            padding: 20px 0;
            background-color: #fff;
        }

        #contact h2 {
            text-align: center;
            font-size: 2.5em; 
            margin-bottom: 20px;
            color: #f9c74f; 
        }

        .contact-form {
            background-color: white; 
            padding: 20px;
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            max-width: 600px; 
            margin: 20px auto; 
        }

        .contact-form label {
            font-weight: bold;
            margin-top: 10px;
            display: block; 
            color: #333;
        }

        .form-input, .form-textarea {
            width: 100%; 
            padding: 12px;
            border: 1px solid #ddd; 
            border-radius: 4px; 
            margin-top: 5px;
            box-sizing: border-box; 
            font-size: 16px; 
        }

        .form-textarea {
            resize: vertical; 
        }

        .form-button {
            background-color: #f9c74f; 
            border: none;
            border-radius: 4px;
            color: #000; 
            padding: 12px 20px;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            transition: background-color 0.3s ease; 
        }

        .form-button:hover {
            background-color: #f9844a; 
        }

        .form-button:active {
            background-color: #f9a825; 
        }

       
        footer {
            background-color: #f9c74f;
            color: #333;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            margin-top: auto; 
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
            <li><a href="inscripciones.php">Inscripciones</a></li>
            <li><a href="iniciodesesion.php">Inicio de sesión</a></li>
        </ul>
    </nav>
    </header>
    

  
    <section id="contact" class="contact">
        <div class="container">
            <h2>Contacto</h2>
            <form action="enviar_contacto.php" method="POST" class="contact-form">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-input" required>

                <label for="correoelectronico">Correo Electrónico:</label>
                <input type="email" id="correoelectronico" name="correoelectronico" class="form-input" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" class="form-textarea" rows="5" required></textarea>

                <button type="submit" class="form-button">Enviar Mensaje</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Merendero Rayitos de Sol. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
