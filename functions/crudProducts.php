<?php
include 'conection.php';
require 'functions.php';
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    mostrarMensajeRegistroExitoso("No iniciaste sesión o ha expirado", "Por favor realiza el login", "../includes/login.php", "Ir al login");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $accion = $_POST['accion'];
    $tabla = $_POST['tabla'];
    $id = $_POST['id'];

    switch ($accion) {
        case 'editar':
            if ($tabla == "contacts") {
                header("Location: ../includes/formUpdateContacts.php?id=" . urlencode($id) . "&tabla=" . urlencode($tabla));
            } else if ($tabla == "administrators") {
                header("Location: ../includes/formUpdateAdmin.php?id=" . urlencode($id) . "&tabla=" . urlencode($tabla));
            } else if($tabla == "motorcycles"){
                header("Location: ../includes/formUpdateMotorcycle.php?id=" . urlencode($id) . "&tabla=" . urlencode($tabla));
            }
            break;
        case 'eliminar':
            $sql = "DELETE FROM $tabla WHERE id = ?";
            ejecutarConsulta($sql, [$id]);
            mostrarMensajeRegistroExitoso("Producto eliminado Exitosamente", "Da click en volver", "../includes/principalAdmin.php", "Volver");
            break;

        default:
            // Acción no válida
            break;
    }

}

