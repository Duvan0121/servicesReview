<?php
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

        <h1>Registra los datos de la motocicleta</h1>
        <form action="../functions/addAdministrator.php" method="POST">
            <label for="id">Id de la motocicleta</label>
            <input type="text" id="id" name="id" required>
            
            <label for="name">Nombre de la motocicleta</label>
            <input type="text" id="name" name="name" required>

            <label for="descripcion">Descripcion:</label>
            <textarea id="description" name="description" rows="5" placeholder="Escribe la descripcion de la motocicleta"></textarea>

            <label for="price">Precio:</label>
            <input type="text" id="price" name="price" required>

            <label for="pathImage">Ruta de la imagen:</label>
            <input type="text" id="pathImage" name="pathImage" required>

            <button type="submit" name="control"; value="motorcycle";>Ingresar motocicleta al catalogo</button>
            <button type="button" onclick="window.location.href='../includes/principalAdmin.php';" id="volver-button">Volver</button>
        </form>

    </div>
  
    <footer>
        <!--<p>&copy; <?php echo date("Y"); ?> Nuestra Empresa. Todos los derechos reservados.</p>-->
        <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
    </footer>
</body>

</html>