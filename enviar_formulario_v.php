<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

   
    $to = "tuemail@gmail.com"; 
    $subject = "Nueva Inscripción de Voluntario";
    $body = "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje";
    $headers = "From: $email";

 
    if (mail($to, $subject, $body, $headers)) {
        echo "Gracias por tu interés en ser voluntario. Nos pondremos en contacto contigo pronto.";
    } else {
        echo "Hubo un problema al enviar tu solicitud. Por favor, inténtalo de nuevo.";
    }
} else {
    echo "Método de solicitud no permitido.";
}
?>
