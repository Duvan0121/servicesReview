<?php
include '../functions/conection.php';
require '../functions/functions.php';
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    mostrarMensajeRegistroExitoso("No iniciaste sesión o ha expirado", "Por favor realiza el login", "../includes/login.php", "Ir al login");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $accion = $_POST['accion'];
    $tabla = isset($_GET['tabla']) ? $_GET['tabla'] : '';
    $tabla = reasignarNamesTables($tabla);

    if ($accion == 'consultar') {
        ?>
        <h1>Registros de la tabla: <?php echo $tabla; ?></h1>
        <?php
        $sql = "SELECT * FROM $tabla";
        $registros = ejecutarConsulta($sql)->fetchAll();
        logicaTablas($registros,$tabla);
    } else {
        if ($tabla == "administrators") {
            header("Location: formCreateAdmin.php");
        } else if ($tabla == "contacts") {
            header("Location: formCreateContacts.php");
        } else if ($tabla == "motorcycles") {
            header("Location: formCreateMotorcycle.php");
        } else {
            header("Location: logout.php");
        }
    }
}
