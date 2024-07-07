<?php
include '../functions/conection.php';
require '../functions/functions.php';
session_start();

// Verificar sesión de usuario
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    mostrarMensajeRegistroExitoso("No iniciaste sesión o ha expirado", "Por favor realiza el login", "../includes/login.php", "Ir al login");
    exit;
}

// Verificar existencia de parámetros GET
if (!isset($_GET['id']) || !isset($_GET['tabla'])) {
    header("Location: ../includes/principalAdmin.php");
    exit;
}

// Filtrar y sanitizar parámetros GET
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$tabla = filter_input(INPUT_GET, 'tabla', FILTER_SANITIZE_STRING);

try {
    // Consultar el contacto a editar
    $sql = "SELECT * FROM $tabla WHERE id = ?";
    $stmt = ejecutarConsulta($sql, [$id]);
    $contact = $stmt->fetch();

    // Verificar si el contacto existe
    if (!$contact) {
        mostrarMensajeRegistroExitoso("Error", "Contacto no encontrado", "../includes/principalAdmin.php", "Volver");
        exit;
    }
} catch (PDOException $e) {
    mostrarMensajeRegistroExitoso("Error en la base de datos", $e->getMessage(), "../includes/principalAdmin.php", "Volver");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
    <link rel="stylesheet" href="../css/principalAdmin.css">
</head>

<body>
    <div class="container">
        <form action="../functions/updateTable.php" method="POST" id="edit-contact-form">
            <h1>Editar datos de la motocicleta</h1>
            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($contact['id']); ?>" required>

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($contact['userName']); ?>" required>

            <label for="cellPhoneNumber">Número de contacto (Celular):</label>
            <input type="number" id="cellPhoneNumber" name="cellPhoneNumber" value="<?= htmlspecialchars($contact['cellPhoneNumber']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($contact['userEmail']); ?>" required>

            <label for="details">Detalles:</label>
            <textarea id="details" name="details" rows="5" placeholder="Escribe los detalles de tu consulta"><?= htmlspecialchars($contact['userDetails']); ?></textarea>
            
            <input type="hidden" name="tabla" value="<?= $tabla ?>">
            <button type="submit" name="control" value="updateContact">Actualizar datos de contacto</button>
            <button type="button" onclick="window.location.href='../includes/principalAdmin.php';" id="volver-button">Cancelar</button>
        </form>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> ACA Duvan Felipe Vargas Devia.</p>
    </footer>
</body>

</html>
