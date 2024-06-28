<?php
include '../functions/conection.php';
require 'functions.php';

$nameTable = "users";
$redirectURL = "../index.php";
$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numId = filter_input(INPUT_POST, 'cellPhoneNumber', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);

    $sql = "INSERT INTO $nameTable (cellPhoneNumber, userName, userEmail, userDetails) VALUES (?, ?, ?, ?)";

    try {
        $stmt = ejecutarConsulta($sql, [$numId, $name, $email, $details]);
        if ($stmt->rowCount() > 0) {
            mostrarMensajeRegistroExitoso();
        } else {
            $mensaje = "Error al registrarse, intente nuevamente";
        }
    } catch (PDOException $e) {
        $mensaje = "Error en la base de datos, por favor inténtelo más tarde";
        error_log('Error en la base de datos: ' . $e->getMessage());
    }
}


?>
