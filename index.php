<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merendero Rayitos de Sol</title>
    <style>
        
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
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

    
        .content {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

       
        .image-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
            justify-content: center;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .image-grid div {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .image-grid div:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .image-grid img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
            cursor: pointer;
        }

     
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
        }

        .modal-content {
            position: relative;
            border-radius: 20px;
            margin: auto;
            display: block;
            width: 80%;
            max-width: 600px;
        }

        .modal-content img {
            width: 100%;
            height: auto;
            border-radius: 20px;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        footer {
            background-color: #f9c74f;
            color: #333;
            text-align: center;
            padding: 10px 0;
            width: 100%;
            position: relative;
            bottom: 0;
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
                <li><a href="formulario.php">Formulario</a></li>
                <li><a href="sobrenosotros.php">Sobre Nosotros</a></li>
                <li><a href="menu.php">Menú</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="inscripciones.php">Inscripciones</a></li>
                <li><a href="iniciodesesion.php">Inicio de sesión</a></li>
            </ul>
        </nav>
    </header>

 
    <div class="content">
        <h2>Bienvenidos a nuestro merendero!</h2>
        <div class="image-grid">
            <div><img src="merendero1.png" alt="Imagen 1"></div>
            <div><img src="merendero2.png" alt="Imagen 2"></div>
            <div><img src="merendero3.png" alt="Imagen 3"></div>
            <div><img src="merendero4.png" alt="Imagen 4"></div>
            <div><img src="merendero5.png" alt="Imagen 5"></div>
            <div><img src="merendero6.png" alt="Imagen 6"></div>
            <div><img src="merendero7.png" alt="Imagen 7"></div>
            <div><img src="merendero8.png" alt="Imagen 8"></div>
            <div><img src="merendero9.png" alt="Imagen 9"></div>
            <div><img src="merendero10.png" alt="Imagen 10"></div>
            <div><img src="merendero11.png" alt="Imagen 11"></div>
            <div><img src="merendero12.png" alt="Imagen 12"></div>
            <div><img src="merendero13.png" alt="Imagen 13"></div>
            <div><img src="merendero14.png" alt="Imagen 14"></div>
            <div><img src="merendero15.png" alt="Imagen 15"></div>
        </div>
    </div>

  
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <img id="imgModal" alt="Imagen modal">
        </div>
    </div>


    <footer>
        <p>&copy; 2024 Merendero Rayitos de Sol. Todos los derechos reservados.</p>
    </footer>

    <script>
        
        const images = document.querySelectorAll('.image-grid img');
        const modal = document.getElementById('myModal');
        const modalImg = document.getElementById('imgModal');
        const span = document.querySelector('.close');

       
        images.forEach(img => {
            img.addEventListener('click', function() {
                modal.style.display = "block";
                modalImg.src = this.src;
            });
        });

        
        span.onclick = function() {
            modal.style.display = "none";
        }

      
        window.onclick = function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
