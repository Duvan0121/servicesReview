<?php
include '../functions/conection.php';
require '../functions/functions.php';
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    mostrarMensajeRegistroExitoso("No iniciaste sesión o ha expirado", "Por favor realiza el login", "../includes/login.php", "Ir al login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACA Duvan Vargas</title>
    <link rel="stylesheet" href="../css/principalAdmin.css">
</head>

<body>
    <div class="container">

        <form action="../functions/addAdministrator.php" method="POST" id="login-form">
            <h1>Registra los datos de contacto</h1>
            <label for="name">Identificación:</label>
            <input type="number" id="id" name="id" required>

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="cellPhoneNumber">Número de contacto(Celular):</label>
            <input type="number" id="cellPhoneNumber" name="cellPhoneNumber" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="details">Detalles:</label>
            <textarea id="details" name="details" rows="5" placeholder="Escribe los detalles de tu consulta"></textarea>

            <button type="submit" name="control" value="contact">Registrar datos de contacto</button>
            <button type="button" onclick="window.location.href='../includes/principalAdmin.php';"
                id="volver-button">Volver</button>
        </form>

    </div>


    <footer>
        <!--<p>&copy; <?php echo date("Y"); ?> Nuestra Empresa. Todos los derechos reservados.</p>-->
        <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
    </footer>
</body>

</html>