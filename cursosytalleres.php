<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "merendero1";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$success_message = "";
$error_message = "";

// Eliminar taller
if (isset($_POST['delete_taller'])) {
    $id_taller = $_POST['id_taller'];
    $sql_delete_taller = "DELETE FROM talleres WHERE id_taller = ?";
    $stmt_delete_taller = $conn->prepare($sql_delete_taller);
    $stmt_delete_taller->bind_param('i', $id_taller);
    
    if ($stmt_delete_taller->execute()) {
        $success_message = "Taller eliminado con éxito.";
    } else {
        $error_message = "Error al eliminar el taller: " . $stmt_delete_taller->error;
    }

    $stmt_delete_taller->close();
}

// Eliminar curso
if (isset($_POST['delete_curso'])) {
    $id_curso = $_POST['id_curso'];
    $sql_delete_curso = "DELETE FROM cursos WHERE id_curso = ?";
    $stmt_delete_curso = $conn->prepare($sql_delete_curso);
    $stmt_delete_curso->bind_param('i', $id_curso);

    if ($stmt_delete_curso->execute()) {
        $success_message = "Curso eliminado con éxito.";
    } else {
        $error_message = "Error al eliminar el curso: " . $stmt_delete_curso->error;
    }

    $stmt_delete_curso->close();
}

// Agregar taller
if (isset($_POST['submit_taller'])) {
    $taller = $_POST['taller'];
    $fecha_inicio_taller = $_POST['fecha_inicio_taller'];
    $fecha_fin_taller = $_POST['fecha_fin_taller'];

    $sql_taller = "INSERT INTO talleres (taller, fecha_inicio, fecha_fin) VALUES (?, ?, ?)";
    $stmt_taller = $conn->prepare($sql_taller);

    if ($stmt_taller === false) {
        $error_message = "Error en la preparación de la consulta: " . $conn->error;
    } else {
        $stmt_taller->bind_param('sss', $taller, $fecha_inicio_taller, $fecha_fin_taller);

        if ($stmt_taller->execute()) {
            $success_message = "Taller agregado con éxito.";
        } else {
            $error_message = "Error al agregar el taller: " . $stmt_taller->error;
        }

        $stmt_taller->close();
    }
}

// Agregar curso
if (isset($_POST['submit_curso'])) {
    $curso = $_POST['curso'];
    $fecha_inicio_curso = $_POST['fecha_inicio_curso'];
    $fecha_fin_curso = $_POST['fecha_fin_curso'];

    $sql_curso = "INSERT INTO cursos (curso, fecha_inicio, fecha_fin) VALUES (?, ?, ?)";
    $stmt_curso = $conn->prepare($sql_curso);

    if ($stmt_curso === false) {
        $error_message = "Error en la preparación de la consulta: " . $conn->error;
    } else {
        $stmt_curso->bind_param('sss', $curso, $fecha_inicio_curso, $fecha_fin_curso);

        if ($stmt_curso->execute()) {
            $success_message_curso = "Curso agregado con éxito.";
        } else {
            $error_message = "Error al agregar el curso: " . $stmt_curso->error;
        }

        $stmt_curso->close();
    }
}

// Obtener talleres
$sql_get_talleres = "SELECT * FROM talleres";
$result_talleres = $conn->query($sql_get_talleres);

// Obtener cursos
$sql_get_cursos = "SELECT * FROM cursos";
$result_cursos = $conn->query($sql_get_cursos);

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cursos y Talleres</title>
    <style>
        body {
            font-family: Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #f9c74f;
            padding: 15px 20px;
            color: white;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            flex-grow: 1;
            text-align: center;
        }

        .header-buttons {
            display: flex;
            align-items: center;
        }

        .header-buttons a {
            text-decoration: none;
            color: black;
            background-color: #f7b42c;
            padding: 10px 20px;
            border-radius: 20px;
            font-weight: bold;
            margin-left: 10px;
        }

        .header-buttons a:hover {
            background-color: #f9c74f;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between; /* Alinea los cuadros uno al lado del otro */
            gap: 20px; /* Espacio entre los cuadros */
        }

        .form-container {
            width: 48%; /* Ajusta el ancho de los cuadros */
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container form {
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"], input[type="date"] {
            width: calc(100% - 24px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #f9c74f;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #f9844a;
        }

        .table-container {
            margin-top: 40px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f9c74f;
            color: white;
        }

        .delete-btn {
            background-color: #e63946;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .delete-btn:hover {
            background-color: #d62828;
        }

        /* Estilo adicional para los listados */
        ul {
            list-style-type: none; /* Sin viñetas */
            padding: 0; /* Sin padding */
            margin: 0; /* Sin margin */
        }

        li {
            margin-bottom: 10px; /* Espacio entre los items de la lista */
        }
    </style>
</head>
<body>
    <header>
        <div class="header-buttons">
            <a href="botones.php">Volver</a>
        </div>
        <h1>Actualizar Cursos y Talleres</h1>
    </header>

    <div class="container">
        <!-- Formulario de agregar taller -->
        <div class="form-container">
            <h2>Agregar Taller</h2>
            <form action="" method="POST">
                <label for="taller">Taller:</label>
                <input type="text" id="taller" name="taller" required>

                <label for="fecha_inicio_taller">Fecha de Inicio:</label>
                <input type="date" id="fecha_inicio_taller" name="fecha_inicio_taller" required>

                <label for="fecha_fin_taller">Fecha de Finalización:</label>
                <input type="date" id="fecha_fin_taller" name="fecha_fin_taller" required>

                <button type="submit" name="submit_taller">Agregar Taller</button>
            </form>

            <!-- Listado de talleres con botón de eliminar -->
            <h2>Talleres Existentes</h2>
            <ul>
                <?php while ($row = $result_talleres->fetch_assoc()): ?>
                    <li>
                        <?php echo $row['taller']; ?> - 
                        <?php echo $row['fecha_inicio']; ?> a 
                        <?php echo $row['fecha_fin']; ?>
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="id_taller" value="<?php echo $row['id_taller']; ?>">
                            <button type="submit" name="delete_taller" class="delete-btn">Eliminar</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>

        <!-- Formulario de agregar curso -->
        <div class="form-container">
            <h2>Agregar Curso</h2>
            <form action="" method="POST">
                <label for="curso">Curso:</label>
                <input type="text" id="curso" name="curso" required>

                <label for="fecha_inicio_curso">Fecha de Inicio:</label>
                <input type="date" id="fecha_inicio_curso" name="fecha_inicio_curso" required>

                <label for="fecha_fin_curso">Fecha de Finalización:</label>
                <input type="date" id="fecha_fin_curso" name="fecha_fin_curso" required>

                <button type="submit" name="submit_curso">Agregar Curso</button>
            </form>

            <!-- Listado de cursos con botón de eliminar -->
            <h2>Cursos Existentes</h2>
            <ul>
                <?php while ($row = $result_cursos->fetch_assoc()): ?>
                    <li>
                        <?php echo $row['curso']; ?> - 
                        <?php echo $row['fecha_inicio']; ?> a 
                        <?php echo $row['fecha_fin']; ?>
                        <form action="" method="POST" style="display:inline;">
                            <input type="hidden" name="id_curso" value="<?php echo $row['id_curso']; ?>">
                            <button type="submit" name="delete_curso" class="delete-btn">Eliminar</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

    <?php if ($success_message): ?>
        <div class="alert alert-success"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <?php if ($error_message): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php endif; ?>
</body>
</html>

