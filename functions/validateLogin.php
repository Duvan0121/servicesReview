<?php
include 'conection.php';
require 'functions.php';

$nameTable = "sellers";
$redirectURL = "../index.php";
$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING); // Usar filter_input también para la contraseña

    $sql = "SELECT * FROM $nameTable WHERE emailAdmin = ?";

    try {
        $stmt = ejecutarConsulta($sql, [$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passwordAdmin'])) {
            session_start();
            $_SESSION['user_id'] = $user['idAdmin'];
            $_SESSION['user_name'] = $user['nameAdmin'];
            $mensaje = "Inicio de sesión exitoso";
            mostrarMensajeRegistroExitoso("Ingreso Exitoso","Da click en continuar","../includes/principalAdmin.php","Continuar");
        } else {
            $mensaje = "Correo electrónico o contraseña incorrectos";
            viewAlert($mensaje);
            $redirectURL = "../includes/login.php"; // Redirigir al dashboard o página de inicio del usuario
            header("Refresh: 1; URL=".$redirectURL);
        }
    } catch (PDOException $e) {
        $mensaje = "Error en la base de datos, por favor inténtelo más tarde";
        error_log('Error en la base de datos: ' . $e->getMessage());
    }
}

?>
