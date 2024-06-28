<?php
function viewAlert($message) {
    echo '<script>alert("' . $message . '");</script>';
}

function mostrarMensajeRegistroExitoso() {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Exitoso</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .container {
                text-align: center;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: 400px;
                width: 100%;
            }
            h1 {
                color: #333;
            }
            p {
                color: #666;
                font-size: 1.1em;
            }

            button{
                padding: 10px;
                background-color:#333;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Registro Exitoso</h1>
            <p>Gracias por registrarte. Pronto nos pondremos en contacto contigo.</p>
            <button type="submit" onclick="window.location.href = \'../index.php\';">Volver</button>
        </div>
    </body>
    </html>
    ';
}
?>