<?php

ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - Merendero Rayitos de Sol</title>
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
            gap: 15px; 
            margin-bottom: 15px;
        }

        .header-logo img {
            height: 60px; 
            width: 60px;
            border-radius: 50%; 
            object-fit: cover; 
        }

        header h1 {
            margin: 0;
            font-size: 2.5em; 
            text-align: center;
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

        nav ul li {
            margin: 0;
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

        
        .about {
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .about h2, .about h3 {
            color: #ffeb3b; 
        }

        .about p {
            line-height: 1.6;
        }

        .image-container {
            text-align: center;
            margin: 20px 0;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .team {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-around;
        }

        .team-member {
            flex: 1 1 300px; 
            background-color: #fff9c4; 
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .team-member img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .testimonials blockquote {
            border-left: 4px solid #fff9c4; 
            padding-left: 20px;
            margin: 20px 0;
            font-style: italic;
            background-color: #fff9c4;
            border-radius: 8px;
            padding: 15px;
        }

        .btn {
            display: inline-block;
            background-color: #fff9c4; 
            color: #333;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin: 10px 5px;
            text-align: center;
        }

        .btn:hover {
            background-color: #ffec01; 
        }

      
        .contact-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        .contact-buttons a {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-voluntario {
            background-color: #f9844a; 
            color: #fff;
        }

        .btn-voluntario:hover {
            background-color: #e76f51;
            transform: translateY(-2px); 
        }

        .btn-donacion {
            background-color: #f9844a;
            color: #fff;
        }

        .btn-donacion:hover {
            background-color: #e76f51;
            transform: translateY(-2px); 
        }

      
        footer {
            background-color: #f9c74f; 
            color: #333;
            text-align: center;
            padding: 10px 0;
            width: 100%;
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
                <li><a href="menu.php">Menú</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="inscripciones.php">Inscripciones</a></li>
                <li><a href="iniciodesesion.php">Inicio de sesión</a></li>
            </ul>
        </nav>
    </header>

   
    <section id="about" class="about">
        <div class="container">
            <h2>Sobre Nosotros</h2>
            <p>En Merendero Rayitos de Sol, nos dedicamos a ofrecer alimentos nutritivos y una sonrisa cálida a todos los que lo necesitan. Fundado en [año de fundación], nuestro objetivo es proporcionar una comida reconfortante y crear una comunidad unida. Creemos que cada plato cuenta y cada sonrisa importa, y trabajamos incansablemente para hacer una diferencia en la vida de las personas.</p>
            
            <h2>Nuestra Historia</h2>
            <p>Merendero Rayitos de Sol fue fundado en [año] por [nombre del fundador o fundadores] con el propósito de [motivo de la fundación]. Desde entonces, hemos crecido y evolucionado, sirviendo a la comunidad y ampliando nuestros programas para ayudar a más personas cada día.</p>

            <div class="image-container">
                <img src="https://www.diariodecuyo.com.ar/media/uploads/2023/10/whatsapp_image_2020-07-25_at_18_51_54_crop1595715322562-728x485.webp" alt="Imagen sobre nosotros">
            </div>

            <h2>Conoce a Nuestro Equipo</h2>
            <div class="team">
                <div class="team-member">
                    <img src="https://via.placeholder.com/100" alt="Miembro del equipo">
                    <h4>Azucena</h4>
                    <p>Coordinador General</p>
                </div>
                <div class="team-member">
                    <img src="https://via.placeholder.com/100" alt="Miembro del equipo">
                    <h4>Nombre 2</h4>
                    <p>Encargado de Cocina</p>
                </div>
                <div class="team-member">
                    <img src="https://via.placeholder.com/100" alt="Miembro del equipo">
                    <h4>Nombre 3</h4>
                    <p>Voluntario</p>
                </div>
            </div>

            <h2>Lo que dicen de nosotros</h2>
            <div class="testimonials">
                <blockquote>"Rayitos de Sol ha sido una bendición para nuestra comunidad. No solo nos alimentan, sino que nos hacen sentir parte de una gran familia."</blockquote>
                <blockquote>"El equipo de Rayitos de Sol siempre tiene una sonrisa y un plato caliente esperándonos. ¡Gracias por todo lo que hacen!"</blockquote>
            </div>
        </div>
    </section>

    <!-- Sección de botones de contacto -->
    <div class="contact-buttons">
        <a href="voluntario.php" class="btn btn-voluntario">¡Quiero ser voluntario!</a>
        <a href="donar.php" class="btn btn-donacion">¡Quiero hacer una donación!</a>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2024 Merendero Rayitos de Sol. Todos los derechos reservados.</p>
    </footer>
</body>
</html>

<?php
// Enviar la salida del buffer al navegador
ob_end_flush();
?>
