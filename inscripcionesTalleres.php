<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merendero1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT id_taller, taller, fecha_inicio, fecha_fin FROM talleres";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción a Talleres</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }

        header {
            background-color: #f9c74f;
            padding: 20px 0;
            color: #000;
            text-align: center;
            border-bottom: 4px solid #fdd835;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
            font-weight: bold;
        }

        .header-buttons {
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .header-buttons a {
            background-color: #f9c74f;
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header-buttons a:hover {
            background-color: #ffeb3b;
        }

        ul {
            list-style-type: none;
            padding: 20px;
            margin: 0 auto;
            max-width: 800px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        li {
            margin: 0;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex: 1 1 calc(50% - 20px);
            box-sizing: border-box;
        }

        li button {
            background-color: #f9c74f;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        li button:hover {
            background-color: #ffeb3b;
        }

        .form-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 30px auto;
            text-align: center;
            border: 2px solid #f9c74f;
            display: none;
        }

        .form-box h2 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #666;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #f9c74f;
            border: none;
            border-radius: 8px;
            color: #000;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #fdd835;
        }

        .message {
            display: none;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

    </style>
</head>
<body>
    <header>
        <div class="header-buttons">
            <a href="inscripciones.php">Volver</a>
        </div>
        <h1>Inscripción a Talleres</h1>
    </header>

    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <?php echo $row['taller'] . " - Desde: " . $row['fecha_inicio'] . " Hasta: " . $row['fecha_fin']; ?>
                <button onclick="showForm('<?php echo $row['taller']; ?>')">Inscribirse</button>
            </li>
        <?php endwhile; ?>
    </ul>

    <div class="form-box" id="inscriptionForm">
        <h2>Inscripción al Taller</h2>
        <form id="inscriptionFormElement">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="correoelectronico">Correo Electrónico:</label>
                <input type="email" id="correoelectronico" name="correoelectronico" required>
            </div>
            <div class="form-group">
                <label for="taller">Taller:</label>
                <input type="text" id="taller" name="taller" readonly>
            </div>
            <div class="form-group">
                <button type="button" onclick="submitForm()">Inscribirse</button>
            </div>
        </form>
        <div id="message" class="message"></div>
    </div>

    <script>
        function showForm(taller) {
            document.getElementById("inscriptionForm").style.display = "block";
            document.getElementById("taller").value = taller;
        }

        function submitForm() {
            var form = document.getElementById("inscriptionFormElement");
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "inscribir_taller.php", true);
            xhr.onload = function () {
                var message = document.getElementById("message");
                if (xhr.status === 200) {
                    message.className = "message success";
                    message.textContent = "Se inscribió exitosamente";
                } else {
                    message.className = "message error";
                    message.textContent = "Error al inscribirse";
                }
                message.style.display = "block";
            };
            xhr.send(formData);
        }
    </script>

</body>
</html>



