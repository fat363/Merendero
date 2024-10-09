<?php

ob_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hacer una Donación - Merendero Rayitos de Sol</title>
    <style>
        body {
            font-family:  Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f7f6;
            color: #333;
            text-align: center;
        }
        header {
            background-color: #ffb74d;
            color: white;
            padding: 20px 0;
            font-size: 1.5em;
        }
        .container {
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .btn {
            display: inline-block;
            background-color: #ffeb3b;
            color: #333;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin: 10px 5px;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #fdd835;
        }
        h2 {
            color: #ffb74d;
        }
        p {
            line-height: 1.6;
        }
        
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px; 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px; 
            border: 1px solid #888; 
            width: 80%; 
            max-width: 600px;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .modal-buttons {
            text-align: right;
            margin-top: 20px;
        }
        .input-container input[type="text"] {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            width: calc(100% - 24px);
            max-width: 400px;
            margin: 5px 0;
            border-color: #bbb;
        }

        .header-buttons {
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .header-buttons a {
            background-color: #f9c74f;
            color: #000;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .header-buttons a:hover {
            background-color: #ffeb3b;
        }

    </style>
</head>
<body>
    <div class="header-buttons">
        <a href="sobrenosotros.php">Volver</a>
    </div>
    <header>
        Voluntario - Merendero Rayitos de Sol
    </header>
    <div class="container">
        <h2>¡Tu apoyo es invaluable!</h2>
        <p>Gracias por considerar hacer una donación. Tu contribución ayuda a proporcionar alimentos y apoyo a quienes más lo necesitan.</p>
        
        <h3>¿Te gustaría ser voluntario?</h3>
        <p>Si deseas unirte como voluntario, contáctanos a través de WhatsApp. Haz clic en el botón a continuación para enviarnos un mensaje y te responderemos con más detalles.</p>

        <div class="input-container">
            
            <button class="btn" id="showTerms">Contactar por WhatsApp</button>
        </div>
        
        <p>O si prefieres, puedes contactarnos directamente para otras formas de donación o voluntariado.</p>
    </div>

  
    <div id="termsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Términos y Condiciones</h2>
            <p><strong>1. Aceptación de los Términos</strong></p>
            <p>Al contactarnos a través de WhatsApp para ser voluntario en el Merendero Rayitos de Sol, usted acepta estos Términos y Condiciones. Si no está de acuerdo con alguno de los términos, por favor no proceda con el contacto.</p>
            
            <p><strong>2. Uso de la Información</strong></p>
            <p>La información que proporcione, incluyendo su número de teléfono y cualquier otra información personal, será utilizada únicamente para comunicarnos con usted sobre su interés en ser voluntario. No compartiremos su información con terceros sin su consentimiento.</p>
            
            <p><strong>3. Contacto</strong></p>
            <p>Uno de nuestros representantes se pondrá en contacto con usted a través de WhatsApp para brindarle más detalles sobre cómo puede unirse como voluntario.</p>
            
            <p><strong>4. Cambios en los Términos</strong></p>
            <p>Nos reservamos el derecho de actualizar o modificar estos Términos y Condiciones en cualquier momento sin previo aviso. Los cambios serán efectivos inmediatamente después de su publicación en el sitio web.</p>
            
            <div class="modal-buttons">
                <input type="text" id="phoneNumber" placeholder="Número de teléfono (incluye el código del país)" required>
                <button class="btn" id="acceptTerms">Aceptar</button>
                <button class="btn" id="rejectTerms">Rechazar</button>
            </div>
        </div>
    </div>

    <script>
       
        var modal = document.getElementById("termsModal");

        
        var btn = document.getElementById("showTerms");

        
        var span = document.getElementsByClassName("close")[0];

        
        var acceptButton = document.getElementById("acceptTerms");
        var rejectButton = document.getElementById("rejectTerms");

        
        var phoneNumberInput = document.getElementById("phoneNumber");

       
        btn.onclick = function() {
            modal.style.display = "block";
        }

        
        span.onclick = function() {
            modal.style.display = "none";
        }

       
        acceptButton.onclick = function() {
            var phoneNumber = phoneNumberInput.value;
            if (phoneNumber) {
                var message = "Hola, quiero ser voluntario en el Merendero Rayitos de Sol. Por favor, mándenme más información.";
                var whatsappUrl = "https://wa.me/" + encodeURIComponent(phoneNumber) + "?text=" + encodeURIComponent(message);
                window.location.href = whatsappUrl;
            } else {
                alert("Por favor, ingrese su número de teléfono.");
            }
        }

        
        rejectButton.onclick = function() {
            modal.style.display = "none";
        }

        
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>

<?php

$content = ob_get_clean();


echo $content;
?>



