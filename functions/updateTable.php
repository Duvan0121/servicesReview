<?php
include_once 'conection.php';
require '../functions/functions.php';

session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    mostrarMensajeRegistroExitoso("No iniciaste sesión o ha expirado", "Por favor realiza el login", "../includes/login.php", "Ir al login");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameTabla = $_POST['tabla'];
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($nameTabla == "administrators") {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $name = filter_input(INPUT_POST, 'nameAdmin', FILTER_SANITIZE_STRING);
        $pass = $_POST['pass'];
        $pass_hashed = password_hash($pass, PASSWORD_DEFAULT);
        $camposSql = ["email" => $email, "name" => $name, "password" => $pass_hashed];

    } elseif ($nameTabla == "motorcycles") {
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $pathImage = $_POST['pathImage'];
        $camposSql = ["nameMotorcycle" => $name, "descriptionMotorcycle" => $description, "priceMotorcycle" => $price, "pathImage" => $pathImage];

    } elseif ($nameTabla == "contacts") {
        $cellPhone = filter_input(INPUT_POST, 'cellPhoneNumber', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);
        $camposSql = ["cellPhoneNumber" => $cellPhone, "userName" => $name, "userEmail" => $email, "userDetails" => $details];
    } else {
        header("Location: logout.php");
        exit;
    }

    // Construir la parte SET de la sentencia SQL
    $setSql = implode(', ', array_map(function ($key) {
        return "$key = ?";
    }, array_keys($camposSql)));

    // Construir la sentencia completa
    $sql = "UPDATE $nameTabla SET $setSql WHERE id = ?";

    // Agregar el id al final de los valores
    $valoresSql = array_values($camposSql);
    $valoresSql[] = $id;

    try {
        $stmt = ejecutarConsulta($sql, $valoresSql);
        if ($stmt->rowCount() > 0) {
            mostrarMensajeRegistroExitoso("Información actualizada exitosamente", "Ya puede gestionar este registro actualizado", "../includes/principalAdmin.php", "Regresar al panel");
        } else {
            mostrarMensajeRegistroExitoso("ERROR EN LA BASE DE DATOS", "Intente nuevamente", "../includes/logout.php", "Reiniciar");
        }
    } catch (PDOException $e) {
        mostrarMensajeRegistroExitoso("ERROR EN LA BASE DE DATOS Catch", $e->getMessage(), "../includes/logout.php", "Reiniciar");
    }
}

